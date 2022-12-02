<?php


use Squire\Models\Country;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('hellouniverse');
// });

Route::get('/post', function () {
    return view('postform');
});

Route::get('country', function () {
    return Country::all();
});

