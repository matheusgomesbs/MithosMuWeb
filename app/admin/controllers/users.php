<?php

use Mithos\Core\Validation;
use Mithos\Admin\Auth;

Route::map('/login', function () {

    if (Request::isPost()) {
        if (Auth::login(Input::post('username'), Input::post('password'))) {
            App::redirect('/admin');
        } else {
            View::set('error', __('Usuário e/ou senha estão incorretos'));
        }
    }

    View::display('users/login', ['layout' => 'login']);

})
->via('GET', 'POST');


Route::get('/logout', function () {

    Auth::logout();
    App::redirect('/admin/login');

});

Route::get('/users', function () {
    
    $users = Connection::fetchAll('SELECT u.*, g.name AS grupo FROM mw_users u LEFT JOIN mw_user_groups g ON (g.id = u.group_id)');
    View::display('users/index', compact('users'));
    
})
->name('users');

Route::map('/users/add', function () {
    
    if (Request::isGet()) {
        $groups = Connection::fetchAll('SELECT * FROM mw_user_groups');
        View::display('users/add', compact('groups'));
    } else {
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'email' => [
                __('E-Mail inválido') => [
                    'rule' => 'email',
                    'allowEmpty' => true
                ]
            ],
            'username' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'password' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);
    
        if ($validation->isValid()) {
            try {

                Connection::insert('mw_users', [
                    'name' => Input::post('name'),
                    'email' => Input::post('email'),
                    'username' => Input::post('username'),
                    'password' => md5(Input::post('password')),
                    'super_user' => Input::post('super_user'),
                    'group_id' => Input::post('group_id')
                ], [
                    'string', 'string', 'string', 'string',
                    'integer', 'integer'
                ]);

                success(__('Usuário adicionado com sucesso'), ['refresh' => 'configs.users']);
            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }
    
})
->via('GET', 'POST')
->name('users.add');


Route::map('/users/edit/:id', function ($id) {

    $user = Connection::fetchAssoc('SELECT * FROM mw_users WHERE id = :id', ['id' => $id], ['integer']);

    if (Request::isGet()) {
        $groups = Connection::fetchAll('SELECT * FROM mw_user_groups');
        View::display('users/edit', compact('user', 'groups'));
    } else {
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'email' => [
                __('E-Mail inválido') => [
                    'rule' => 'email',
                    'allowEmpty' => true
                ]
            ],
            'username' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);
    
        if ($validation->isValid()) {
            try {
                $password = Input::post('password');

                Connection::update('mw_users', [
                    'name' => Input::post('name'),
                    'email' => Input::post('email'),
                    'username' => Input::post('username'),
                    'password' => !empty($password) ? md5($password) : $user['password'],
                    'super_user' => Input::post('super_user'),
                    'group_id' => Input::post('group_id')
                ], [
                    'id' => $id
                ], [
                    'string', 'string', 'string', 'string',
                    'integer', 'integer'
                ]);

                success(__('Usuário editado com sucesso'), ['refresh' => 'configs.users']);
            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }
    
})
->via('GET', 'POST')
->name('users.edit');


Route::get('/users/delete/:id', function ($id) {

    try {
        Connection::delete('mw_users', [
            'id' => $id
        ]);

        success(__('Usuário deletado com sucesso'));
    } catch (\Exception $ex) {
        error($ex->getMessage());
    }
    
})
->name('users.delete');