<?php

use App\Models\News;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/{news:slug}', function (News $news) {
//     return view('user.news', ['news' => $news]);
// });

Route::get('/', [NewsController::class, 'home'])->name('user.home');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('user.news');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('user.category');

// Route::get('/', function () {
//     return view('user.home');
// });

// Route::get('/category', function () {
//     return view('category');
// });

// Route::get('/index', function () {
//     return view('admin.index');
// });

// Route::get('/create', function () {
//     return view('admin.create');
// });

// Route::get('/home', function () {
//     return view('user.home');
// });

// Route::get('/news', function () {
//     return view('user.news');
// });

// Route::get('/category', function () {
//     return view('user.category');
// });

// Route::prefix('admin')->name('admin.')->group(function(){
//     Route::resource('categories', CategoryController::class)->middleware('role:admin');
// });

// Route::prefix('creator')->name('creator.')->group(function(){
//     Route::resource('news', NewsController::class)->middleware('role:creator');
//     Route::resource('news', NewsController::class)->middleware('role:admin');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    // 'role:admin',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Route::prefix('admin')->name('admin.')->group(function(){
    //     Route::resource('categories', CategoryController::class)->middleware('role:admin');
    // });

    Route::get('/user', function () {
        return view('admin.user');
    })->name('user');
    Route::get('/news', function () {
        return view('admin.news');
    })->name('news');
    Route::get('/category', function () {
        return view('admin.category');
    })->name('category');
});
