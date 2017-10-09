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
        
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'digilasuite');
        
        if (class_exists('Form')) {
            $defaultOptions = [
                'name', 'label', 'value', 'errors', 'need' => false,
                'attributes' => [
                    'colLabel' => 'col-md-2',
                    'colInput' => 'col-md-10',
                    'placeholder' => null,
                    'description' => null,
                    'options' => []
                ]
            ];
            
            \Form::component('dgText', 'digilasuite::components.form.text', $defaultOptions);
            \Form::component('dgPassword', 'digilasuite::components.form.password', $defaultOptions);
            \Form::component('dgTextarea', 'digilasuite::components.form.textarea', $defaultOptions);
            \Form::component('dgSelect', 'digilasuite::components.form.select', $defaultOptions);
            \Form::component('dgFile', 'digilasuite::components.form.file', $defaultOptions);
            \Form::component('dgName', 'digilasuite::components.form.name', $defaultOptions);
            \Form::component('dgDate', 'digilasuite::components.form.date', $defaultOptions);
            \Form::component('dgDatetime', 'digilasuite::components.form.datetime', $defaultOptions);
            \Form::component('dgBlood', 'digilasuite::components.form.blood', $defaultOptions);
            \Form::component('dgPref', 'digilasuite::components.form.pref', $defaultOptions);
        }
        
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
