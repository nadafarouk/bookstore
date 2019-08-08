<?php


namespace App\Services\Book;


use App\Repositories\Book\BookRepositoryInterface;
use http\Exception;

class BookControllerService implements BookServiceInterface
{
    protected  $bookService;
    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService=$bookService;
    }

    public function getAllBooks(){
        if($books=$this->bookService->getAllBooks()){
            dd($books);
            return $books;
        }
        abort(404);
    }


}
