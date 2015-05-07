<?php

use Mithos\Core\Validation;
use Mithos\Core\Config;
    
Route::get('/coins', function () {
    
    $coins = config('coins', []);
    View::display('coins/index', compact('coins'));
    
})
->name('coins');


Route::map('/coins/add', function () {
    
    if (Request::isGet()) {
        View::display('coins/add');
    } else {
        $validation = new Validation(Input::post(), array(
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'table' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'column' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'foreign_key' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ));
    
        if ($validation->isValid()) {
            $coins = config('coins', []);

            $coins[] = [
                'name' => Input::post('name'),
                'table' => Input::post('table'),
                'column' => Input::post('column'),
                'foreign_key' => Input::post('foreign_key')
            ];
    
            try {
                Config::save('coins', $coins);
                success(__('Moeda adicionada com sucesso'), ['refresh' => 'configs.coins']);
            } catch (\Exception $ex) {
                error('Error: ' . $ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }
    
})
->via('GET', 'POST')
->name('coins.add');


Route::map('/coins/edit/:id', function ($id) {

    $coins = config('coins', []);
    
    if (Request::isGet()) {
        $coin = $coins[$id];
        $coin['id'] = $id;
        View::display('coins/edit', compact('coin'));
    } else {
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'table' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'column' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'foreign_key' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);
    
        if ($validation->isValid()) {
            $coins[$id] = [
                'name' => Input::post('name'),
                'table' => Input::post('table'),
                'column' => Input::post('column'),
                'foreign_key' => Input::post('foreign_key')
            ];
    
            try {
                Config::save('coins', $coins);
                success(__('Moeda editada com sucesso'), ['refresh' => 'configs.coins']);
            } catch (\Exception $ex) {
                error('Error: ' . $ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }
})
->via('GET', 'POST')
->name('coins.edit');


Route::get('/coins/delete/:id', function ($id) {
    
    $coins = config('coins', []);
    unset($coins[$id]);
    
    try {
        Config::save('coins', $coins);
        success(__('Moeda deletada com sucesso'));
    } catch (\Exception $ex) {
        error('Error: ' . $ex->getMessage());
    }
    
})
->name('coins.delete');