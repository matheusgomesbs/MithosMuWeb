<?php

use Mithos\Account\Service;
use Mithos\Core\Validation;

Route::get('/services', function () {

    View::display('services/index', [
        'services' => util('Hash')->nest(Service::getAllServices())
    ]);

})
->name('configs.services');


Route::map('/services/add', function () {

    if (Request::isGet()) {
        View::display('services/add');
    } else {

    }

})
->via('GET', 'POST');

Route::map('/services/edit/(:service)', function ($service = null) {

    $service = Service::getService($service);

    if (Request::isGet()) {
        View::display('services/edit', [
            'service' => $service
        ]);
    } else {
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);

        if ($validation->isValid()) {

            try {
                Connection::transactional(function () use ($service) {

                    Connection::delete('mw_viptype_services', [
                        'service_id' => $service['id']
                    ]);

                    Connection::update('mw_services', [
                        'name' => htmlentities(Input::post('name'))
                    ], [
                        'id' => $service['id']
                    ]);

                    if (Input::post('viptype')) {
                        foreach (Input::post('viptype') as $id => $name) {
                            Connection::insert('mw_viptype_services', [
                                'viptype' => $id,
                                'service_id' => $service['id']
                            ], [
                                'integer', 'integer'
                            ]);
                        }
                    }

                    success(__('Serviço %s editado com sucesso', $service['name']), [
                        'refresh' => 'configs.services'
                    ]);
                });
            } catch (\Exception $ex) {
                error('Error: ' . $ex->getMessage());
            }

        } else {
            error(__($validation->getErrors()));
        }
    }

})
->via('GET', 'POST')
->name('config.services.edit');


Route::get('/services/deactive/:service', function ($service) {

    try {
        Service::deactive($service);
        success(__('Serviço %s desativado com sucesso', $service));
    } catch (Exception $ex) {
        error($ex->getMessage());
    }

})
->name('config.services.deactive');

Route::get('/services/active/:service', function ($service) {

    try {
        Service::active($service);
        success(__('Serviço %s ativado com sucesso', $service));
    } catch (Exception $ex) {
        error($ex->getMessage());
    }

})
->name('config.services.active');