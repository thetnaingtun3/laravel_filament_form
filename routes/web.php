<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('hellouniverse');
});

Route::get('/post', function () {
    return view('postform');
});
