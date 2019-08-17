<?php


namespace App\Services\Book\Interfaces;


interface BookServiceInterface
{
    public function  getAllBooks();
    public function getBookById($id);
    public function createNewBook($title,$isbn,$authorId,$description,$language);
    public function deleteBook($book);
    public function updateBook($id,$title,$isbn,$authorId,$description,$language);
}
