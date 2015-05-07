<?php

use Mithos\Core\Validation;
use Mithos\Account\Account;
use Mithos\Admin\Auth;
use Mithos\Account\Warehouse;
use Mithos\Item\Item;

Route::map('/accounts/find', function () {
    
    if (Request::isGet()) {
        View::display('accounts/find');
    } else {
        $term = Input::post('term');
        $accounts = Connection::fetchAll('SELECT TOP 30
            mi.memb_guid AS guid,
            mi.memb___id AS username,
            mi.memb__pwd AS password,
            mi.memb_name AS name,
            mi.mail_addr AS email,
            mi.tel__numb AS phone,
            mi.fpas_ques AS secretQuestion,
            mi.fpas_answ AS secretAnswer,
            mi.sno__numb AS personalId,
            mi.bloc_code AS blocked,
            ms.IP AS ip
            FROM MEMB_INFO mi
            LEFT JOIN MEMB_STAT ms ON mi.memb___id = ms.memb___id COLLATE DATABASE_DEFAULT
            WHERE mi.memb___id LIKE :term
            OR mi.mail_addr LIKE :term
            OR mi.tel__numb LIKE :term
            OR ms.IP LIKE :term
            OR EXISTS(SELECT * FROM Character WHERE Name LIKE :term AND AccountID = mi.memb___id)
        ', [
            'term' => '%' . $term . '%',
            'name' => $term
        ]);
        foreach ($accounts as $key => $account) {
            $accounts[$key]['characters'] = Connection::fetchAll('SELECT Name AS name FROM Character WHERE AccountID = :account', ['account' => $account['username']]);
        }
        View::display('accounts/findresult', compact('accounts'));
    }
    
})
->via('GET', 'POST')
->name('accounts.find');


Route::map('/accounts/edit/:username', function ($username) {
    
    if (Request::isGet()) {
        $account = new Account($username);

        if ($account->exists()) {
            $data = $account->toArray();
            $data['ban'] = Connection::fetchAssoc('SELECT *
                FROM mw_banned_accounts 
                WHERE account = :account
                AND status = 1
            ', [
                'account' => $username
            ]);

            View::set('account', $data);
        }
        View::display('accounts/edit');
    } else {
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);

        if ($validation->isValid()) {
            $account = new Account($username);
    
            try {
                $password = Input::post('password');
                $expire = Input::post('vip_expire');

                $account->setName(Input::post('name'))
                        ->setSecretQuestion(Input::post('secret_question'))
                        ->setSecretAnswer(Input::post('secret_answer'))
                        ->setEmail(Input::post('email'))
                        ->setBlocked(Input::post('blocked'))
                        ->setConfirmedEmail(Input::post('confirmed_email'))
                        ->setPersonalId(Input::post('pid'))
                        ->setVipType(Input::post('vip_type'))
                        ->setVipExpire(!empty($expire) ? DateTime::createFromFormat('d/m/Y', $expire)->format(DateTime::ISO8601) : null);
            
                $coins = [];
                foreach (config('coins', []) as $coin) {
                    $coins[$coin['column']] = Input::post('coin_' . $coin['column']);
                }

                if (!empty($coins)) {
                    $account->setCoins($coins);
                }

                if ($password != null && !empty($password)) {
                    $account->setPassword($password);
                }
            
                $account->update();
            
                success(__('Usuário %s editado', $username));

            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }
    
})
->via('GET', 'POST')
->name('accounts.edit');


Route::map('/accounts/ban(/:username)', function ($username = '') {
    
    if (Request::isGet()) {
        View::display('accounts/ban', compact('username'));
    } else {
        $validation = new Validation(Input::post(), [
            'account' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Usuário não encontrado') => [
                    'rule' => ['exists', 'MEMB_INFO', 'memb___id']
                ]
            ],
            'cause' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'days' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Digite apenas números') => [
                    'rule' => 'numeric'
                ]
            ]
        ]);
    
        if ($validation->isValid()) {
            try {
                $ban = Connection::fetchAssoc('SELECT * FROM mw_banned_accounts WHERE account = :account AND status = 1', ['account' => Input::post('account')]);
        
                if (!empty($ban)) {
                    error(__('Usuário %s já está banido', Input::post('account')));
                } else {

                    Connection::transactional(function () {
                        $account = new Account(Input::post('account'));

                        Connection::insert('mw_banned_accounts', [
                            'account' => Input::post('account'),
                            'cause' => htmlentities(Input::post('cause')),
                            'block_date' => new \DateTime(),
                            'unblock_date' => new \DateTime("+ " . Input::post('days') . " days"),
                            'user_block_id' => Auth::getUser('id'),
                            'status' => 1
                        ], [
                            'string', 'string', 'datetime',
                            'datetime', 'integer', 'integer'
                        ]);

                        $account->setBlocked(true);
                        $account->update();

                        success(__('Usuário %s banido por %s dias', Input::post('account'), Input::post('days')));
                    });

                }
            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }
    
})
->via('GET', 'POST')
->name('accounts.ban');


Route::map('/accounts/warehouse/:username', function ($username) {

    $account = new Account($username);
    $warehouse = new Warehouse($account, 8, 15);

    if (Request::isGet()) {
        $warehouse->load(bin2hex($account->getBinWarehouse()));

        View::display('accounts/warehouse', compact('warehouse', 'account'));
    } else {
        try {
            $warehouse->setMoney(Input::post('money'));
            $warehouse->update(false);
            success(__('Informações salvas com successo'));
        } catch (Exception $ex) {
            error($ex->getMessage());
        }
    }

})
->via('GET', 'POST')
->name('accounts.warehouse');

Route::get('/accounts/warehouse/organize/:username', function ($username) {

    $account = new Account($username);
    $warehouse = new Warehouse($account, 8, 15);

    $items = str_split(bin2hex($account->getBinWarehouse()), config('item.size', 20));

    for ($i = 0; $i < $warehouse->getWidth() * $warehouse->getHeight(); $i++) {
        $item = new Item($items[$i]);
        $item->parse();
        if (!$item->isHexEmpty()) {
            $warehouse->addItem($item);
        }
    }
    try {
        $warehouse->update();
        success('Báu organizado com sucesso', ['refresh' => 'accounts.warehouse']);
    } catch (\Exception $ex) {
        error($ex->getMessage());
    }

})
->name('accounts.warehouse.organize');