<?php

namespace App\Providers;

use App\Http\Controllers\User\UserController;
use App\Services\User\UserControllerService;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\User\UserRepositoryInterface', 'App\Repositories\User\UserRepository');

        $this->app->when(UserController::class)
            ->needs(UserServiceInterface::class)
            ->give(UserControllerService::class);

        $this->app->when(UserControllerService::class)
            ->needs(UserServiceInterface::class)
            ->give(UserService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
