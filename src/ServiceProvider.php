<?php

namespace Digila\Suite;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/digilasuite.php';
        $this->publishes([$configPath => config_path('digilasuite.php')], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/digilasuite.php';
        $this->mergeConfigFrom($configPath, 'digilasuite');
 
        $this->app->bind('Digila\Suite\Generater\Snowflake', 'Digila\Suite\Services\Generater\Snowflake');
        $this->app->bind('Digila\Suite\Generater\Code', 'Digila\Suite\Services\Generater\Code');
    }

}
