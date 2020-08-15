<?php

namespace App\Providers;
use App\Category;
use View;
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
        View::composer('Font-end.includes.main-menu',function ($view){
         $view->with('category',Category::where('status','1')->get());
        });
    }
}
