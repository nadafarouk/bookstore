<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Book\Interfaces\BookServiceInterface;
use App\Services\Book\BookService;
use App\Repositories\Book\Interfaces\BookRepositoryInterface;
use App\Repositories\Book\BookRepository;

class BookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);

        $this->app->bind(BookServiceInterface::class , BookService::class);

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
