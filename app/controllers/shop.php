<?php
    
App::get('/shop', function () {
    
    View::display('shop/shop');
    
});

App::get('/shop/detail/:id', function () {
    
    View::display('shop/detail');
    
});