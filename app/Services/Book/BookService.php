<?php


namespace App\Services\Book;


use App\Repositories\Book\BookRepositoryInterface;

class BookService implements BookServiceInterface
{
    protected $bookRepository;
    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository=$bookRepository;
    }
    public function getAllBooks(){
//        dd($this->bookRepository);
        return $this->bookRepository->getAllBooks();
    }
}
