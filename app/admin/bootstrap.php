<?php

use Mithos\Menu\Menu;
use Mithos\Admin\Auth;

$app->hook('slim.before.dispatch', function () use ($app) {
    $route = $app->router()->getCurrentRoute();
    $uri = $app->request()->getResourceUri();

    if (!$app->request()->isAjax() && !in_array($uri, ['/admin/login', '/admin', '/admin/logout'])) {
        $app->redirect('/admin');
    } else {
        if (!Auth::loggedIn() && $app->request()->getResourceUri() !== '/admin/login') {
            if ($app->request()->isAjax()) {
                $app->contentType('application/json');
                echo json_encode(['failed' => true, 'error' => 'Você precisa estar logado para ter acesso a este recurso.']);
                $app->stop();
            } else {
                $app->redirect('/admin/login');
            }
        } else {
            $user = Auth::getUser();
            $access = explode(',', $user['access']);
            if ($route->getName() != null && $user['super_user'] == 0) {
                if (!in_array($route->getName(), $access)) {
                    if ($app->request()->isAjax()) {
                        $app->contentType('application/json');
                        echo json_encode(['failed' => true, 'error' => 'Você não possui direito de acesso para acessar esta página.']);
                        $app->stop();
                    } else {
                        $app->redirect('/admin/no-access');
                    }
                }
            }
        }
    }
});

Menu::getInstance('admin')->add([
    'id' => 'accounts',
    'title' => __('Usuários')
])
->add([
    'id' => 'accounts.find',
    'title' => __('Localizar'),
    'url' => '/admin/accounts/find',
    'window' => [
        'title' => 'Localizar usuário'
    ]
])
->add([
    'id' => 'accounts.ban',
    'title' => __('Bloquear usuário'),
    'url' => '/admin/accounts/ban',
    'window' => [
        'width' => 400
    ]
])
->add([
    'id' => 'accounts.online',
    'title' => __('Jogadores online'),
    'url' => '/admin/characters/loggedin'
])
->add([
    'id' => 'plugins',
    'title' => __('Plugins')
])
->add([
    'id' => 'plugins.manager',
    'title' => __('Gerenciar'),
    'url' => '/admin/plugins',
    'window' => [
        'title' => 'Gerenciar plugins'
    ]
])
// Menu::getInstance()->add(array(
//     'id' => 'plugins.install',
//     'title' => __('Instalar'),
//     'url' => '/admin/plugins/install',
//     'window' => array(
//         'title' => 'Instalar plugin',
//         'width' => 400,
//         'height' => 300
//     )
// ));


->add([
    'id' => 'configs',
    'title' => __('Configurações'),
    'sequence' => 99
])
->add([
    'id' => 'configs.template',
    'title' => __('Template'),
    'url' => '/admin/configs/template',
    'window' => [
        'title' => 'Configuração template',
        'height' => 500,
        'width' => 608
    ]
])
->add([
    'id' => 'configs.general',
    'title' => __('Geral'),
    'url' => '/admin/configs/general',
    'window' => [
        'width' => 400,
        'height' => 500
    ]
])
->add([
    'id' => 'configs.downloads',
    'title' => __('Downloads'),
    'url' => '/admin/downloads'
])
->add([
    'id' => 'configs.coins',
    'title' => __('Moedas'),
    'url' => '/admin/coins'
])
->add([
    'id' => 'configs.vip',
    'title' => __('Sistema VIP'),
    'url' => '/admin/configs/vip',
    'window' => [
        'width' => 400
    ]
])
->add([
    'id' => 'configs.services',
    'title' => 'Serviços',
    'url' => '/admin/services'
])
->add([
    'id' => 'configs.register',
    'title' => __('Cadastro'),
    'url' => '/admin/configs/register',
    'window' => [
        'width' => 400
    ]
])
->add([
    'id' => 'configs.emails',
    'title' => __('E-mails'),
    'url' => '/admin/configs/emails',
    'window' => [
        'width' => 400
    ]
])
->add([
    'id' => 'configs.sep1',
    'title' => '-'
])
->add([
    'id' => 'configs.groups',
    'title' => __('Grupos'),
    'url' => '/admin/groups'
])
->add([
    'id' => 'configs.users',
    'title' => __('Usuários'),
    'url' => '/admin/users'
])
->add([
    'id' => 'configs.sep2',
    'title' => '-'
]);