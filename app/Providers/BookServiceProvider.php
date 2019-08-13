<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Book\BookServiceInterface;
use App\Services\Book\BookControllerService;
use App\Services\Book\BookService;
use App\Http\Controllers\Item\BookController;
class BookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Book\BookRepositoryInterface', 'App\Repositories\Book\BookRepository');

        $this->app->when(BookController::class)
            ->needs(BookServiceInterface::class)
            ->give(BookControllerService::class);

        $this->app->when(BookControllerService::class)
            ->needs(BookServiceInterface::class)
            ->give(BookService::class);
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
