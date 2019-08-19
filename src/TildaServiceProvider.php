<?php

namespace TildaTools\Laravel;

use Illuminate\Support\ServiceProvider;
use TildaTools\Tilda\TildaApi;
use TildaTools\Tilda\TildaLoader;

class TildaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $defaultConfigPath = __DIR__ . '/Config/tilda.php';

        $this->mergeConfigFrom($defaultConfigPath, 'tilda');

        $this->app->singleton(TildaApi::class, function() {
            return new TildaApi(config('tilda.api'));
        });
        $this->app->singleton(TildaLoader::class, function () {
            return new TildaLoader($this->app->make(TildaApi::class), config('tilda'));
        });

        $this->app->alias(TildaApi::class, 'tilda.api');
        $this->app->alias(TildaLoader::class, 'tilda.loader');

        $this->publishes([
            $defaultConfigPath => config_path('tilda.php'),
        ], 'config');
    }

}
