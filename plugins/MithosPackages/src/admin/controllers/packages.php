<?php

use Mithos\Menu\Menu;
use Mithos\Core\Validation;

Menu::getInstance('admin')->add([
    'id' => 'configs.packages',
    'url' => '/admin/packages',
    'title' => __('Pacotes')
]);

Route::get('/packages', function () {

    $packages = Connection::fetchAll('SELECT * FROM mw_packages');

    View::display('MithosPackages.index', [
        'packages' => $packages
    ]);

})
->name('configs.packages');

Route::map('/packages/add', function () {

    if (Request::isGet()) {
        View::display('MithosPackages.add');
    } else {
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'price' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);

        if ($validation->isValid()) {
            try {
                $coins = [];
                foreach (Input::post('coins') as $coin => $amount) {
                    if (!empty($amount)) {
                        $coins[$coin] = $amount;
                    }
                }
                Connection::insert('mw_packages', [
                    'package' => Input::post('name'),
                    'description' => Input::post('desc'),
                    'viptype' => Input::post('viptype'),
                    'vipdays' => Input::post('vipdays'),
                    'coins' => json_encode($coins),
                    'price' => util('Number')->toFloat(Input::post('price')),
                    'active' => Input::post('active')
                ], [
                    'string', 'string', 'integer',
                    'integer', 'string', 'boolean'
                ]);

                success(__('Pacote adicionado com sucesso'), [
                    'refresh' => 'configs.packages'
                ]);

            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }

})
->via('GET', 'POST')
->name('configs.packages.add');


Route::map('/packages/edit/:id', function ($id = null) {

    $package = Connection::fetchAssoc('SELECT * FROM mw_packages where id = :id', ['id' => $id]);
    $package['coins'] = empty($package['coins']) ? '' : (array) json_decode($package['coins']);

    if (Request::isGet()) {
        View::display('MithosPackages.edit', [
            'package' => $package
        ]);
    } else {
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'price' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);

        if ($validation->isValid()) {
            try {
                $coins = [];
                foreach (Input::post('coins') as $coin => $amount) {
                    if (!empty($amount)) {
                        $coins[$coin] = $amount;
                    }
                }
                Connection::update('mw_packages', [
                    'package' => Input::post('name'),
                    'description' => Input::post('desc'),
                    'viptype' => Input::post('viptype'),
                    'vipdays' => Input::post('vipdays'),
                    'price' => util('Number')->toFloat(Input::post('price')),
                    'coins' => json_encode($coins),
                    'active' => Input::post('active')
                ], [
                    'id' => $id
                ], [
                    'string', 'string', 'integer',
                    'integer', 'float', 'string', 'boolean'
                ]);

                success(__('Pacote editado com sucesso'), [
                    'refresh' => 'configs.packages'
                ]);

            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }

})
->via('GET', 'POST')
->name('configs.packages.edit');


Route::get('/packages/delete/:id', function ($id = null) {

    try {
        Connection::delete('mw_packages', [
            'id' => $id
        ]);
        success('Pacote deletado com sucesso');
    } catch (\Exception $ex) {
        error('Error: ' . $ex->getMessage());
    }

})
->name('configs.packages.delete');