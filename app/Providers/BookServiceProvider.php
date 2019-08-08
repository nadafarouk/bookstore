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
//        $this->app->bind(BookServiceInterface::class, BookControllerService::class);
//        $this->app->bind(BookServiceInterface::class, BookService::class);

        $this->app->when('App\Http\Controllers\Item\BookController@index')
            ->needs('App\Services\Book\BookServiceInterface')
            ->give('App\Services\Book\BookControllerService');

        $this->app->when('App\Services\Book\BookControllerService')
            ->needs('App\Services\Book\BookServiceInterface')
            ->give('App\Services\Book\BookService');
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
