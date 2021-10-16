<?php namespace Malek\UniqueNumberGenerator;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

/**
 * Class ServiceProvider
 *
 * @package Malek\UniqueNumberGenerator
 */
class ServiceProvider extends BaseServiceProvider
{

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->setUpConfig();
    }

    /**
     * Register the application services.
     */
    public function register()
    {

    }

    protected function setUpConfig(): void
    {
        $source = dirname(__DIR__) . '/resources/config/numerable.php';

        if ($this->app instanceof LaravelApplication) {
            $this->publishes([$source => config_path('numerable.php')], 'config');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('numerable');
        }

        $this->mergeConfigFrom($source, 'numerable');
    }
}
