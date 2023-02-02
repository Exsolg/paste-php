<?php

namespace App\Providers;

use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Repositories\PasteRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PasteRepositoryInterface::class, function ($app) {
            return new PasteRepository();
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
