<?php

namespace Anwar\LaravelOwl;

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
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
