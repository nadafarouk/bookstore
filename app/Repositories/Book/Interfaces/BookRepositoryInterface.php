<?php


namespace App\Repositories\Book\Interfaces;


interface BookRepositoryInterface
{
    public function getAllBooks();
    public function getBookById($id);
    public function createNewBook($title,$isbn,$authorId,$description,$languageId);
    public function deleteBook($book);
    public function updateBook($id,$title,$isbn,$authorId,$description,$languageId);
}
