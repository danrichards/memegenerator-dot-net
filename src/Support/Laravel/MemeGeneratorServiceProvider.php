<?php

namespace Dan\MemeGenerator\Support\Laravel;

use Dan\MemeGenerator\Client;
use Illuminate\Support\ServiceProvider;

/**
 * Class MemeGeneratorServiceProvider
 */
class MemeGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/memegenerator.php' => config_path('memegenerator.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function() {
            return new Client(
                $username = config('memegenerator.username'),
                $password = config('memegenerator.password'),
                $api_key = config('memegenerator.api_key')
            );
        });
    }
}
