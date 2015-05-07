<?php

use Mithos\Core\Config;
use Mithos\Util\Hash;
use Mithos\Core\Validation;
    
Route::get('/configs/template', function () {
    
    $templates = [];
    foreach (new \DirectoryIterator(TEMPLATES_PATH) as $file) {
        if ($file->isDir() && !in_array($file->getFilename(), ['.', '..', 'admin', 'mail'])) {
            $temp = [];
            if (file_exists($file->getPathname() . DS . 'info.php')) {
                $temp = require $file->getPathname() . DS . 'info.php';
            } else {
                $temp = [
                    'name' => $file->getFilename(),
                    'author' => 'Desconhecido',
                    'description' => '',
                    'website' => '',
                    'version' => '',
                    'screen' => ''
                ];
            }
            $temp['active'] = $temp['name'] == config('template.site');
            $templates[] = $temp;
        }
    }
    View::display('templates/index', ['templates' => Hash::sort($templates, '{n}.active', 'desc')]);

})
->name('configs.template');


Route::get('/configs/template/active/:name', function ($template) {
    
    try {
        Config::save('template.site', $template);
        success('Template ' . $template . ' ativado com sucesso');
    } catch (\Exception $ex) {
        error('Error: ' . $ex->getMessage());
    }
    
})
->name('configs.template.active');


Route::get('/configs/template/edit/:name', function ($template) {

    View::display('templates/edit');

})
->name('configs.template.edit');


Route::map('/configs/general', function () {
    
    if (Request::isGet()) {
        View::display('configs/general');
    } else {

        try {
            Config::save([
                'site.title' => Input::post('site_title'),
                'server.name' => Input::post('server_name'),
                'server.version_name' => Input::post('server_version_name'),
                'server.version' => Input::post('server_version'),
                'server.experience' => Input::post('server_experience'),
                'server.drop' => Input::post('server_drop'),
                'server.max_level' => Input::post('server_max_level'),
                'server.max_status' => Input::post('server_max_status'),
                'smtp.host' => Input::post('smtp_host'),
                'smtp.username' => Input::post('smtp_username'),
                'smtp.password' => Input::post('smtp_password'),
                'smtp.port' => Input::post('smtp_port'),
                'smtp.secure' => Input::post('smtp_secure') == 1,
                'connectserver.host' => Input::post('connect_host'),
                'connectserver.port' => Input::post('connect_port'),
                'joinserver.host' => Input::post('join_host'),
                'joinserver.port' => Input::post('join_port'),
                'debug' => Input::post('debug') == 1,
                'url_rewrite' => Input::post('url_rewrite') == 1
            ]);

            success('Configurações salvar com sucesso');

        } catch (\Exception $ex) {
            error($ex->getMessage());
        }
    }

})
->via('GET', 'POST')
->name('configs.general');


Route::map('/configs/vip', function () {

    if (Request::isGet()) {
        View::display('configs/vip');
    } else {

        $validation = new Validation(Input::post(), [
            'column_type' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'column_expire' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);

        if ($validation->isValid()) { 

            try {

                $types = [];
                foreach (Input::post('types') as $type) {
                    if (!empty($type['code']) && !empty($type['name'])) {
                        $types[$type['code']] = $type['name'];
                    }
                }

                Config::save([
                    'vip.column_type' => Input::post('column_type'),
                    'vip.column_expire' => Input::post('column_expire'),
                    'vip.types' => $types
                ]);

                success('Configurações de VIP salvas com sucesso');

            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }

})
->via('GET', 'POST')
->name('configs.vip');


Route::map('/configs/register', function () {
    
    if (Request::isGet()) {
        View::display('configs/register');
    } else {
        try {
            $questions = Input::post('secret_questions');
        
            Config::save([
                'register.confirm_email' => Input::post('confirm_email'),
                'register.create_blocked' => Input::post('create_blocked'),
                'register.secret_questions' => !empty($questions) ? array_filter($questions, function ($var) { return !empty($var); }) : array(),
                'register.bonus.vip.type' => Input::post('bonus_vip_type'),
                'register.bonus.vip.days' => Input::post('bonus_vip_days')
            ]);

            success(__('Configurações salvas com sucesso'));
        } catch (\Exception $ex) {
            error($ex->getMessage());
        }
    }
    
})
->via('GET', 'POST')
->name('configs.register');


Route::get('/configs/emails', function () {

    $emails = [];
    foreach (new \DirectoryIterator(TEMPLATES_PATH . 'mail' . DS) as $file) {
        if ($file->isFile()) {
            $emails[] = $file->getFileName();
        }
    }
    View::display('configs/emails', compact('emails'));

})
->name('configs.emails');

Route::get('/configs/emails/edit/:file', function ($file) {

    if (Request::isGet()) {
        View::display('configs/editemail', [
            'file' => $file,
            'filecontent' => file_get_contents(TEMPLATES_PATH . 'mail' . DS . $file)
        ]);
    } else {
        file_put_contents(TEMPLATES_PATH . 'mail' . DS . $file, Input::post("filecontent"));
        success(__('Arquivo %s editado com sucesso', $file));
    }

})
->via('GET', 'POST')
->name('configs.emails.edit');