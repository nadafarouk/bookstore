<?php


namespace App\Repositories\Book;


use App\Models\Book;
use App\Repositories\Book\Interfaces\BookRepositoryInterface;
class BookRepository implements BookRepositoryInterface
{
    public function getAllBooks()
    {
        return Book::paginate(5);
    }

    public function getBookById($id)
    {
        return Book::where('id',$id)->first();
    }

    public function createNewBook($title,$isbn,$authorId,$description,$languageId)
    {
            return Book::create([
                'title'=> $title,
                'description'=>$description,
                'author_id'=>$authorId,
                'language_id'=>$languageId,
                'isbn'=>$isbn
            ]);
    }

    public function deleteBook($id){
        return Book::destroy($id);
    }

    public function updateBook($id, $title, $isbn, $authorId, $description, $languageId)
    {
        $book = $this->getBookById($id);

        if($title)
            $book->title = $title;
        if($isbn)
            $book->isbn = $isbn;
        if($authorId)
            $book->author_id = $authorId;
        if($description)
            $book->description = $description;
        if($languageId)
            $book->language_id = $languageId;

        $book->save();
        return $book;
    }

}
