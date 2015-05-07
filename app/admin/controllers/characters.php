<?php

use Mithos\Character\Character;
use Mithos\Admin\Menu;
use Mithos\Core\Validation;
//use Mithos\Version;

Route::get('/characters/loggedin', function () {

    $servers = [];
    
    foreach (Server::getCharactersOnline() as $server) {
        $servers[$server['server_name']][] = $server;
    }

    View::display('characters/loggedin', ['servers' => $servers]);
    
})
->name('characters.loggedin');


Route::get('/characters/logout/:name', function ($name) {

    $character = new Character($name);

    try {
        if ($character->disconnect()) {
            success(__('Personagem %s desconectado do jogo com sucesso', $name));
        } else {
            error(__('Não foi possivel desconetar'));
        }
    } catch (\Exception $ex) {
        error($ex->getMessage());
    }

})
->name('characters.logout');


Route::map('/characters/edit/:name', function ($name) {

    if (Request::isGet()) {
        $character = new Character($name);

        if ($character->exists()) {
            View::set('character', $character->toArray());
        }
    
        View::display('characters/edit');
    } else {
        
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'level' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Level deve estar entre 1 e %s', config('server.max_level', 350)) => [
                    'rule' => ['between', 1, config('server.max_level', 350)]
                ]
            ],
            'strength' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Força deve estar entre 0 e %s', config('server.max_status', 32767)) => [
                    'rule' => ['between', 0, config('server.max_status', 32767)]
                ]
            ],
            'agility' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Agilidade deve estar entre 0 e %s', config('server.max_status', 32767)) => [
                    'rule' => ['between', 0, config('server.max_status', 32767)]
                ]
            ],
            'energy' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Energia deve estar entre 0 e %s', config('server.max_status', 32767)) => [
                    'rule' => ['between', 0, config('server.max_status', 32767)]
                ]
            ],
            'vitality' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Vitalidade deve estar entre 0 e %s', config('server.max_status', 32767)) => [
                    'rule' => ['between', 0, config('server.max_status', 32767)]
                ]
            ],
            'command' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty',
                    'condition' => config('server.version') > Version::V097
                ],
                __('Lideraça deve estar entre 0 e %s', config('server.max_status', 32767)) => [
                    'rule' => ['between', 0, config('server.max_status', 32767)],
                    'condition' => config('server.version') > Version::V097
                ]
            ]
        ]);
        
        if ($validation->isValid()) {
            try {
                $character = new Character($name);

                if ($character->exists()) {
                    $character->setName(Input::post('name'))
                            ->setLevel(Input::post('name'))
                            ->setClass(Input::post('name'))
                            ->setMap(Input::post('name'))
                            ->setPositionX(Input::post('name'))
                            ->setPositionX(Input::post('name'))
                            ->setStrength(Input::post('name'))
                            ->setAgility(Input::post('name'))
                            ->setEnergy(Input::post('name'))
                            ->setVitality(Input::post('name'))
                            ->setExperience(Input::post('name'))
                            ->setPoints(Input::post('name'))
                            ->setCode(Input::post('name'))
                            ->setMoney(Input::post('name'));

                    if (config('server.version', Version::V097) > Version::V097) {
                        $character->setCommand(Input::post('name'));
                    }

                    $character->upd();
                }

                success(__('Personagem %s editado com sucesso', Input::post('name')));
            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
        
    }
    
})
->via('GET', 'POST')
->name('characters.edit');