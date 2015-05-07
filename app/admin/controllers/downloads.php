<?php

use Mithos\Core\Validation;
use Mithos\Core\Config;
    
Route::get('/downloads', function () {
    
    $downloads = config('downloads', array());
    View::display('downloads/index', compact('downloads'));
    
})
->name('downloads');


Route::map('/downloads/add', function () {
    
    if (Request::isGet()) {
        View::display('downloads/add');
    } else {
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'size' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);
    
        if ($validation->isValid()) {
            $downloads = config('downloads', []);
            $links = [];
            foreach (Input::post('links') as $link) {
                if (!empty($link['name']) && !empty($link['link'])) {
                    $links[$link['name']] = $link['link'];
                }
            }
            $downloads[] = [
                'name' => Input::post('name'),
                'size' => Input::post('size'),
                'desc' => Input::post('desc'),
                'links' => $links
            ];
    
            try {
                Config::save('downloads', $downloads);
                success(__('Download adicionado com sucesso'), ['refresh' => 'configs.downloads']);
            } catch (\Exception $ex) {
                error('Error: ' . $ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }
    
})
->via('GET', 'POST')
->name('downloads.add');


Route::map('/downloads/edit/:id', function ($id) {

    $downloads = Config::get('downloads', []);
    
    if (Request::isGet()) {
        $download = $downloads[$id];
        $download['id'] = $id;
        View::display('downloads/edit', compact('download'));
    } else {
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'size' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);
    
        if ($validation->isValid()) {
            $links = [];
            foreach (Input::post('links') as $link) {
                if (!empty($link['name']) && !empty($link['link'])) {
                    $links[$link['name']] = $link['link'];
                }
            }
            $downloads[$id] = [
                'name' => Input::post('name'),
                'size' => Input::post('size'),
                'desc' => Input::post('desc'),
                'links' => $links
            ];
    
            try {
                Config::save('downloads', $downloads);
                success(__('Download editado com sucesso'), ['refresh' => 'configs.downloads']);
            } catch (\Exception $ex) {
                error('Error: ' . $ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }
})
->via('GET', 'POST')
->name('downloads.edit');


Route::get('/downloads/delete/:id', function ($id) {
    
    $downloads = config('downloads', []);
    unset($downloads[$id]);
    
    try {
        Config::save('downloads', $downloads);
        success('Download deletado com sucesso');
    } catch (\Exception $ex) {
        error('Error: ' . $ex->getMessage());
    }
    
})
->name('downloads.delete');