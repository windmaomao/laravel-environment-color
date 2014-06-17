<?php

namespace QPlot\EnvironmentColor;

use Illuminate\Support\ServiceProvider;
use QPlot\EnvironmentColor\EnvironmentColor;

class ColorServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->package('qplot/environment-color');
        $this->app['environment-color'] = $this->app->share(function($app) {
           return new EnvironmentColor;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('environment-color');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
//        $this->package('qplot/environment-color');

        $app = $this->app;
//        $app['config']->package('barryvdh/laravel-debugbar', $this->guessPackagePath() . '/config');

        $app->after(function ($request, $response) use($app)
        {
            $color = $app['environment-color'];
            $color->modifyResponse($request, $response);
        });
    }

}
