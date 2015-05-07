<?php
    
use Mithos\Core\Plugin;
    
Route::get('/plugins', function () {
    
    $plugins = Plugin::getInstance()->getPluginsInfo();
    View::display('plugins/index', compact('plugins'));
    
})
->name('plugins.manager');


Route::map('/plugins/install', function () {
    
    if (Request::isGet()) {
        View::display('plugins/install');
    } else {
        
    }
    
})
->via('GET', 'POST')
->name('plugins.install');


Route::get('/plugins/active/:plugin', function ($plugin) {
    
    try {
        Plugin::activate($plugin);
        success(__('Plugin %s ativado com sucesso.', $plugin));
    } catch (\Exception $ex) {
        error('Error: ' . $ex->getMessage());
    }
    
})
->name('plugins.active');


Route::get('/plugins/deactivate/:plugin', function ($plugin) {
    
    try {
        Plugin::deactivate($plugin);
        success(__('Plugin %s desativado com sucesso.', $plugin));
    } catch (\Exception $ex) {
        error('Error: ' . $ex->getMessage());
    }
    
})
->name('plugins.deactivate');