<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\danhmuc;


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
        Paginator::useBootstrap();
        view()->composer('welcome',function($view){
            $danhmuc = danhmuc::all();
            $view->with('Danhmuc',$danhmuc);

        });
        view()->composer('Sanpham.loai_sp',function($view){
            $danhmuc = danhmuc::all();
            $view->with('Danhmuc',$danhmuc);

        });
        view()->composer('Sanpham.timkiem',function($view){
            $danhmuc = danhmuc::all();
            $view->with('Danhmuc',$danhmuc);

        });
         view()->composer('lienhe',function($view){
            $danhmuc = danhmuc::all();
            $view->with('Danhmuc',$danhmuc);

        });
    }
}
