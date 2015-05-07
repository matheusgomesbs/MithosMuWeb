<?php

use Mithos\Core\Validation;
use Mithos\Account\Auth;

Route::get('/support/tickets', require_auth(), function () {

    $tickets = Connection::fetchAll('SELECT * FROM mw_helpdesk_tickets WHERE account = :account ORDER BY id DESC', ['account' => user()->getUsername()]);
    View::display('MithosHelpDesk.index', compact('tickets'));

});

Route::map('/support/tickets/add', require_auth(), function () {

    if (Request::isGet()) {
        View::display('MithosHelpDesk.add');
    } else {
        $maxCharMessage = config('helpdesk.max_char_message', 400);
        $validation = new Validation(Input::post(), [
            'department' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'message' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Campo deve conter no máximo %s caracteres', $maxCharMessage) => [
                    'rule' => array('maxlength', $maxCharMessage)
                ]
            ]
        ]);

        if ($validation->isValid()) {
            $last = Connection::fetchAssoc('SELECT * FROM mw_helpdesk_tickets WHERE account = :account ORDER BY id DESC', ['account' => Auth::getAccount()->getUsername()]);

            try {
                if (empty($last) || (strtotime($last['create_date']) + config('helpdesk.timeout', 0) < time())) {
                    Connection::insert('mw_helpdesk_tickets', [
                        'department' => Input::post('department'),
                        'message' => strip_tags(Input::post('message')),
                        'account' => user()->getUsername()
                    ]);

                    success(__('Ticket aberto com sucesso, em breve estaremos entrando em contato'), ['redirect' => '/support/tickets']);
                } else {
                    error(_('Você não pode abrir outro ticket nesse intervalo'));
                }
            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }

})
->via('GET', 'POST');

Route::get('/support/tickets/view/:id', require_auth(), function ($id) {
    $ticket = Connection::fetchAssoc('SELECT *
        FROM mw_helpdesk_tickets 
        WHERE id = :id
        AND account = :account
    ', [
        'id' => $id,
        'account' => Auth::getAccount()->getUsername()
    ], [
        'integer', 'string'
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

    if (empty($ticket)) {
        App::notFound();
    } else {
        View::display('MithosHelpDesk.view', compact('ticket'));
    }
});

Route::post('/support/tickets/add_message/:ticket', require_auth(), function ($ticket) {
    $maxCharMessage = config('helpdesk.max_char_message', 400);
    $validation = new Validation(Input::post(), [
        'message' => [
            __('Campo obrigatório') => [
                'rule' => 'notEmpty'
            ],
            __('Campo deve conter no máximo %s caracteres', $maxCharMessage) => [
                'rule' => array('maxlength', $maxCharMessage)
            ]
        ]
    ]);
    
    if ($validation->isValid()) {
        try {
            Connection::insert('mw_helpdesk_ticket_messages', [
                'message' => strip_tags(Input::post('message')),
                'account' => Auth::getAccount()->getUsername(),
                'ticket_id' => $ticket
            ], [
                'string', 'string', 'integer'
            ]);
            success(__('Mensagem enviada com successo para o ticket #' . $ticket), ['redirect' => '/support/tickets/view/' . $ticket]);
        } catch (\Exception $ex) {
            error('Error: ' . $ex->getMessage());
        }
    } else {
        error($validation->getErrors());
    }
});