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

        $this->app->singleton(TildaLoader::class, function () {
            $client = new TildaApi(config('tilda.api'));
            return new TildaLoader($client, config('tilda'));
        });
        $this->app->alias(TildaLoader::class, 'tilda');

        $this->publishes([
            $defaultConfigPath => config_path('tilda.php'),
        ], 'config');
    }

}
