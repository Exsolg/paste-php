<?php

namespace App\Providers;

use App\Http\Services\Interfaces\PasteServiceInterface;
use App\Http\Services\PasteService;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Repositories\PasteRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
