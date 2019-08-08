<?php


namespace App\Repositories\Book;


use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    public function getAllBooks()
    {
        return Book::paginate(5);
    }

    public function getBookById($id)
    {
        return Book::find($id);
    }

    public function createNewBook($bookData)
    {
        return Book::create($bookData);
    }

    public function deleteBook($id){
        return Book::destroy($id);
    }

    public function updateBook($bookData,$id){
        return Book::where('id',$id)
            ->update($bookData);
    }

}
