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

    }
}
