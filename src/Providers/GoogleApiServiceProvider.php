<?php

namespace TomShaw\GoogleApi\Providers;

use Google\Client;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TomShaw\GoogleApi\GoogleClient;
use TomShaw\GoogleApi\Http\Resources\AccessTokenResource;
use TomShaw\GoogleApi\Http\Resources\LegacyAccessTokenResource;

class GoogleApiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $loader = AliasLoader::getInstance();
        $accessTokenResource = (version_compare(app()->version(), '10.0.0', '<='))
            ? LegacyAccessTokenResource::class : AccessTokenResource::class;
        $loader->alias('TomShaw\GoogleApi\GoogleApiAccessTokenResource', $accessTokenResource);
        $this->loadMigrationsFrom(__DIR__.'/../../resources/database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../../config/config.php' => config_path('google-api.php')], 'config');
            $this->publishes([
                __DIR__.'/../../resources/database/migrations/' => database_path('migrations'),
            ], 'migrations');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'google-api');

        $this->app->bind(GoogleClient::class, fn () => new GoogleClient(new Client));
    }
}
