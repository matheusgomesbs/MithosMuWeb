<?php

Route::get('/partial/:partial', function ($partial) {
    partial($partial);
});