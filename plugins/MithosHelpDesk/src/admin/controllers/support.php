<?php

use Mithos\Menu\Menu;
use Mithos\Admin\Auth;

Menu::getInstance('admin')->add([
    'id' => 'support',
    'title' => __('Help Desk')
])
->add([
    'id' => 'support.pending',
    'title' => __('Pendentes'),
    'url' => '/admin/helpdesk/tickets/pending',
    'window' => [
        'title' => 'Tickets pendentes'
    ]
])
->add([
    'id' => 'support.waiting',
    'title' => __('Em andamento'),
    'url' => '/admin/helpdesk/tickets/waiting',
    'window' => [
        'title' => 'Tickets em andamento'
    ]
])
->add([
    'id' => 'support.completed',
    'title' => __('Concluídos'),
    'url' => '/admin/helpdesk/tickets/completed',
    'window' => [
        'title' => 'Tickets concluídos'
    ]
])
->add([
    'id' => 'support.sep1',
    'title' => '-'
])
->add([
    'id' => 'support.config',
    'title' => __('Configuração'),
    'url' => '/admin/helpdesk/config',
    'window' => [
        'title' => 'Configurações - HelpDesk',
        'height' => 600,
        'width' => 500
    ]
]);


View::add('javascript', ['/plugin/MithosHelpDesk/js/functions.js']);


Route::get('/helpdesk/tickets(/:type)', function ($type = '') {
    $where = '';
    if ($type === 'pending') {
        $where = '1';
    } elseif ($type === 'waiting') {
        $where = '2';
    } elseif ($type === 'completed') {
        $where = '3';
    }
    
    $where = empty($where) ? '' : ' WHERE status = ' . $where;

    $tickets = Connection::fetchAll('SELECT *
        FROM mw_helpdesk_tickets ' . $where . ' 
        ORDER BY create_date ASC');

    View::display('MithosHelpDesk.index', compact('tickets'));
});

Route::map('/helpdesk/config', function () {

    if (Request::isGet()) {
        View::display('MithosHelpDesk.config');
    } else {
        try {
            $departments = Input::post('helpdesk_department');

            Config::save([
                'helpdesk.rules' => Input::post('helpdesk_rules'),
                'helpdesk.departments' => !empty($departments) ? array_filter($departments, function ($var) { return !empty($var); }) : array(),
                'helpdesk.max_char_message' => Input::post('helpdesk_max_char_message'),
                'helpdesk.timeout' => Input::post('helpdesk_timeout')
            ]);

            message(__('Configurações salvas com sucesso.'));
        } catch (\Exception $ex) {
            error('Error: ' . $ex->getMessage());
        }
    }
})
->via('GET', 'POST');


Route::get('/helpdesk/tickets/view/(:id)', function ($id) {
    $ticket = Connection::fetchAssoc('SELECT *
        FROM mw_helpdesk_tickets 
        WHERE id = :id
    ', [
        'id' => $id
    ]);
    $ticket['messages'] = Connection::fetchAll('SELECT
        m.*,
        CASE WHEN m.admin = 1 THEN u.name ELSE mi.memb_name COLLATE DATABASE_DEFAULT END as account_name 
        FROM mw_helpdesk_ticket_messages m
        LEFT JOIN MEMB_INFO mi ON m.account = mi.memb___id
        LEFT JOIN mw_users u ON m.account = u.username 
        WHERE m.ticket_id = :ticket_id
    ', [
        'ticket_id' => $id
    ], [
        'integer'
    ]);
    
    $status = [
        1 => __('Pendente'),
        2 => __('Em andamento'),
        3 => __('Concluído'),
        4 => __('Cancelado')
    ];

    View::display('MithosHelpDesk.view', compact('status', 'ticket'));
});

Route::post('/helpdesk/tickets/add_message/:ticket', function ($ticket) {
    try {
        $message = Input::post('message');
        
        if (!empty($message)) {
            Connection::insert('mw_helpdesk_ticket_messages', [
                'message' => $message,
                'account' => Auth::getUser('username'),
                'ticket_id' => $ticket,
                'admin' => 1
            ], [
                'string', 'string', 'integer', 'integer'
            ]);
        }

        Connection::update('mw_helpdesk_tickets', [
            'status' => Input::post('status'),
            'update_date' => new \DateTime()
        ], [
            'id' => $ticket
        ], [
            'integer', 'datetime'
        ]);

        success(__('Mensagem enviada com successo para o ticket #' . $ticket));
    } catch (\Exception $ex) {
        error('Error: ' . $ex->getMessage());
    }
});