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
        $this->publishes([$configPath => $this->getConfigPath()], 'config');
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
    
    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return config_path('digilasuite.php');
    }

    /**
     * Publish the config file
     *
     * @param  string $configPath
     */
    protected function publishConfig($configPath)
    {
        $this->publishes([$configPath => config_path('digilasuite.php')], 'config');
    }

}
