<?php

namespace Anwar\Laravelowl;

use Anwar\LaravelOwl\Commands\LaravelOwl;
use Anwar\LaravelOwl\Models\OwlRegister;
use Illuminate\Support\ServiceProvider;

class OwlCarouselProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/Routes.php';
        include __DIR__.'/Support/Helper.php';

        $this->publishes([
            __DIR__ . '/Databases' => database_path('migrations'),
        ], 'migrations');


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__."/Databases");

        $this->loadViewsFrom(__DIR__.'/Views', 'LaravelOwl');

        $this->publishes([
            __DIR__ . '/Config/LaravelOwl.php' => config_path('LaravelOwl.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                LaravelOwl::class
            ]);
        }
    }
}
