<?php

namespace App\Providers;

use App\Http\Services\Interfaces\PasteServiceInterface;
use App\Http\Services\PasteService;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PasteServiceInterface::class, function ($app) {
            return new PasteService($app->make(PasteRepositoryInterface::class));
        });
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
