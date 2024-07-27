<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Menggunakan view composer untuk menyediakan data kategori
        View::composer('components.header', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }
}
