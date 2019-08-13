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
        return $this->bookRepository->getAllBooks();
    }

    public function getBookById($id)
    {
        return $this->bookRepository->getBookById($id);
    }

    public function createNewBook($title,$isbn,$authorId,$description,$language)
    {
        return $this->bookRepository->createNewBook($title,$isbn,$authorId,$description,$language);
    }

    public function updateBook($id,$title,$isbn,$authorId,$description,$language)
    {
        return $this->bookRepository->updateBook($id,$title,$isbn,$authorId,$description,$language);
    }
    public function deleteBook($id){
        return $this->bookRepository->deleteBook($id);
    }
}
