<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/app', function () {
    return view('layouts/app');
});

Route::get('/child', function () {
    return view('layouts/child');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/header', function () {
    return view('layouts/header');
});


Route::get('/{any?}', function () {
    return view('index');
})->where('any', '.+');
