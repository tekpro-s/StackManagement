<?php

use App\Http\Controllers\StacksController;
use App\Http\Controllers\TemplatesController;


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

Route::get('/api/signup', [RegisterController::class, 'post']);
Route::get('/api/login', [LoginController::class, 'post']);

Route::get('/api/stacks', [StacksController::class, 'index']);
Route::get('/api/stacks/{id}', [StacksController::class, 'show']);
Route::post('/api/stacks', [StacksController::class, 'store']);
Route::put('/api/stacks/{id}', [StacksController::class, 'update']);
Route::delete('/api/stacks/{id}', [StacksController::class, 'destroy']);


Route::get('/api/templates', [TemplatesController::class, 'index']);
Route::get('/api/templates/{id}', [TemplatesController::class, 'show']);
Route::post('/api/templates', [TemplatesController::class, 'store']);


Route::get('/{any?}', function () {
    return view('index');
})->where('any', '.+');
