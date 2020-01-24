<?php

namespace Freelabois\FiEx\Providers;

use Dotenv\Dotenv;
use Illuminate\Support\ServiceProvider;

class DotEnvServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $dotenv = Dotenv::create(app()->environmentPath(), app()->environmentFile());
        $dotenv->load();
        $dotenv->required('PASSPORT_CLIENT_ID');
        $dotenv->required('PASSPORT_CLIENT_SECRET');
    }
}
