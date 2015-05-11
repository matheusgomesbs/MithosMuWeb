<?php

use Mithos\Slim\Application;
use Mithos\Core\Config;
use Mithos\Core\Plugin;
use Mithos\Database\DriverManager;
use Statical\SlimStatic\SlimStatic;

$loader = require "../vendor/autoload.php";

// define timezone default
date_default_timezone_set('America/Sao_Paulo');

// starts session service
Mithos\Network\Session::start();

// loading base configurations
Config::load([
    'database', 'settings',
    'characters', 'maps', 'paths'
]);

// connect to database
$conn = DriverManager::setConnection([
    'dbname' => config('conn.dbname'),
    'user' => config('conn.username'),
    'password' => config('conn.password'),
    'host' => config('conn.host'),
    'driverClass' => config('conn.driver')
]);
// register sql logging
$conn->getConfiguration()->setSQLLogger(new Doctrine\DBAL\Logging\DebugStack());

// loading configurations from database
Config::loadFromDB();

// init plugins
Plugin::autoload($loader);

// load the APP
$app = new Application([
    'view' => new Mithos\Slim\View(),
    'templates.path' => config('path.templates') . config('template.site', 'default') . DS . 'views',
]);
$app->add(new Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware());
$app->add(new Slim\Middleware\SessionCookie([
    'secret' => 'h5/4jc/)$3kfè4()487HD3d'
]));
$app->notFound(function () use ($app) {
    $app->view()->display('errors/404');
});

// register singletons and facades
$app->container->singleton('connection', function () {
    return Mithos\Database\DriverManager::getConnection();
});
$app->container->singleton('character', function () {
    return new Mithos\Character\Character();
});
$app->container->singleton('account', function () {
    return new Mithos\Account\Account();
});
$app->container->singleton('guild', function () {
    return new Mithos\Guild\Guild();
});
$app->container->singleton('server', function () {
    return new Mithos\Server\Server();
});
$app->container->singleton('plugin', function () {
    return Plugin::getInstance();
});

// add slim app to facade
SlimStatic::boot($app);

// add mithos facades
$proxys = [
    'Connection' => 'Mithos\\Facade\\Proxy\\DriverManagerProxy',
    'Character' => 'Mithos\\Facade\\Proxy\\CharacterProxy',
    'Account' => 'Mithos\\Facade\\Proxy\\AccountProxy',
    'Guild' => 'Mithos\\Facade\\Proxy\\GuildProxy',
    'Server' => 'Mithos\\Facade\\Proxy\\ServerProxy',
    'Plugin' => 'Mithos\\Facade\\Proxy\\PluginProxy'
];
foreach ($proxys as $alias => $proxy) {
    Statical::addProxyService($alias, $proxy, Container::getInstance(), strtolower($alias));
}

if ($app->inAdmin()) {
    require config('path.admin') . 'bootstrap.php';

    $app->config([
        'templates.path' => config('path.templates') . config('template.admin', 'admin') . DS . 'views',
    ]);

    $app->group('/admin', function () use ($app) {
        foreach (glob(config('path.admin') . 'controllers' . DS . '*.php') as $controller) {
            require $controller;
        }

        Plugin::loadAll();
    });
} else {
    foreach (glob(config('path.controllers') . '*.php') as $controller) {
        require $controller;
    }

    Plugin::loadAll();
}

$app->run();