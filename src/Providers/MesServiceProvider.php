<?php


namespace Bkqw\Mes\Providers;


use Illuminate\Support\ServiceProvider;
use Bkqw\Mes\MesAction;

class MesServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/mes.php' => config_path('mes.php')
        ]);
    }


    public function register()
    {
        $this->app->bind(MesAction::class, function($app){
            return new MesAction;
        });
    }


    public function provides()
    {
        return ['mes'];
    }
}
