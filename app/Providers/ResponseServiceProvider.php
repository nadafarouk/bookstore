<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ResponseService;
use App\Services\Interfaces\ResponseServiceInterface;
class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ResponseServiceInterface::class, ResponseService::class);

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
