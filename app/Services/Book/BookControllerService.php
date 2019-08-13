<?php


namespace App\Services\Book;


use App\Exceptions\Book\BookNotDeletedException;
use App\Exceptions\Book\BookNotFoundException;
class BookControllerService implements BookServiceInterface
{
    protected  $bookService;
    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService=$bookService;
    }

    public function getAllBooks(){
        if($books=$this->bookService->getAllBooks()){
            return $books;
        }
        throw new BookNotFoundException ;
    }


    public function getBookById($id)
    {
        if($book=$this->bookService->getBookById($id)){
            return $book;
        }
       throw new BookNotFoundException ;
    }

    public function createNewBook($title,$isbn,$authorId,$description,$language)
    {
        if($book=$this->bookService->createNewBook($title,$isbn,$authorId,$description,$language)){
            return $book;
        }
    }

    public function deleteBook($id)
    {
        if($this->bookService->deleteBook($id)){
            return response()->json(['success'=>'book deleted'],200);
        }
        throw new BookNotDeletedException ;

    }

    public function updateBook($id,$title,$isbn,$authorId,$description,$language)
    {
        if($book=$this->bookService->updateBook($id,$title,$isbn,$authorId,$description,$language)){
            return $book;
        }
    }
}
