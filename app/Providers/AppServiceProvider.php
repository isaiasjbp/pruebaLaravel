<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Artisaninweb\SoapWrapper\ServiceProvider::class;
        $baseUrl = env('API_ENDPOINT');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        Schema::defaultStringLength(191);
        Artisaninweb\SoapWrapper\ServiceProvider::class;
        

    }
}
