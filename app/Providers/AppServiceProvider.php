<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
    }


    public function boot()
    {
        //
    }
}
