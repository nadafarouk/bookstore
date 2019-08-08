<?php


namespace App\Repositories\Book;


interface BookRepositoryInterface
{
    public function getAllBooks();
    public function getBookById($id);
    public function createNewBook($bookData);
    public function deleteBook($id);
    public function updateBook($bookData,$id);
}
