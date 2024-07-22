<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('user.home');
});

Route::get('/category', function () {
    return view('user.category');
});

Route::get('/news', function () {
    return view('user.news');
});

Route::get('/dashboard', function () {
    return view('admin.index');
});

