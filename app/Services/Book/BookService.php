<?php


namespace App\Services\Book;


use App\Services\Book\Interfaces\BookServiceInterface;
use App\Repositories\Book\Interfaces\BookRepositoryInterface;
use App\Exceptions\Book\BookException;

class BookService implements BookServiceInterface
{
    protected $bookRepository;
    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository=$bookRepository;
    }
    public function getAllBooks(){
        $books = $this->bookRepository->getAllBooks();
        if(!$books){
            throw new BookException('BOOK_NOT_FOUND') ;
        }
        return $books;
    }

    public function getBookById($bookId)
    {
        $book = $this->bookRepository->getBookById($bookId);
        if(!$book){
            throw new BookException('BOOK_NOT_FOUND') ;
        }
        return $book;
    }

    public function createNewBook($title, $isbn, $authorId, $description, $languageId)
    {
        $book=$this->bookRepository->createNewBook($title, $isbn, $authorId, $description, $languageId);
        if(!$book){
            throw new BookException('BOOK_NOT_CREATED')  ;
        }
        return $book;
    }

    public function updateBook($bookId,$title,$isbn,$authorId,$description,$languageId)
    {
        $book=$this->bookRepository->updateBook($bookId, $title, $isbn, $authorId, $description, $languageId);
        if(!$book){
            throw new BookException('BOOK_NOT_UPDATED') ;
        }
        return $book;
    }

    public function deleteBook($bookId)
    {
        if(!$this->bookRepository->deleteBook($bookId))
        {
            throw new BookException('BOOK_NOT_DELETED') ;
        }
    }
}
