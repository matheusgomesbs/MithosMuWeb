<?php

return [

    'maintenance' => true,

    'template' => [
        'site' => 'default',
        'admin' => 'admin'
    ],

    'site' => [
        'title' => 'MuOnline o melhor :)'
    ],

    'server' => [
        'name' => 'MuOnline',
        'version' => 1,
        'version_name' => '97+99i',
        'experience' => '100x',
        'drop' => '99%',
        'max_level' => 350,
        'max_status' => 32767
    ],

    'downloads' => [
    ],

    'register' => [
        'confirm_email' => true,
        'create_blocked' => true,
        'secret_questions' => []
    ],

    'smtp' => [
        'host' => '',
        'username' => '',
        'password' => '',
        'port' => '',
        'secure' => true,
        'from' => ['Flavio' => 'hernandes.flavio@gmail.com']
    ],

    'connectserver' => [
        'host' => '',
        'port' => ''
    ],

    'joinserver' => [
        'host' => '',
        'port' => ''
    ],

    'plugins' => [
    ],

    'credit' => [
        'column' => 'credit'
    ],

    'coins' => [
    ],

    'vip' => [
        'column_type' => '',
        'column_expire' => '',
        'types' => []
    ],

    'item' => [
        'size' => 20
    ],

    'debug' => true,

    'url_rewrite' => false

];