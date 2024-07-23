<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('admin.index');
});

Route::get('/create', function () {
    return view('admin.create');
});

Route::get('/home', function () {
    return view('user.home');
});

Route::get('/news', function () {
    return view('user.news');
});

Route::get('/category', function () {
    return view('user.category');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('categories', CategoryController::class)->middleware('role:admin');
});

Route::prefix('creator')->name('creator.')->group(function(){
    Route::resource('news', NewsController::class)->middleware('role:creator');
    Route::resource('news', NewsController::class)->middleware('role:admin');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
