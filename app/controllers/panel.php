<?php

Route::get('/panel', require_auth(), function () {

    View::display('panel/index', [
        'services' => util('Hash')->nest(user()->getAvaliableServices())
    ]);

});

Route::get('/panel/:type', require_auth(), function ($type) {

    View::service('accounts/info', $type);

});