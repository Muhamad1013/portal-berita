<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $kategoriList = Category::whereHas('news')->get();

            foreach ($kategoriList as $kategori) {
                $kategori->limited_news = $kategori->news()->latest()->take(4)->get()->shuffle();
            }

            $view->with('kategoriList', $kategoriList);
        });
    }
}