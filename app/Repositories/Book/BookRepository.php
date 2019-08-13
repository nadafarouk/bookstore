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

    public function createNewBook($title,$isbn,$authorId,$description,$language)
    {
            return Book::create([
                'title'=> $title,
                'description'=>$description,
                'author_id'=>$authorId,
                'language_id'=>$language,
                'isbn'=>$isbn
            ]);
    }

    public function deleteBook($id){
        return Book::destroy($id);
    }

    public function updateBook($id,$title,$isbn,$authorId,$description,$language){
        return Book::where('id',$id)
            ->update([
                'title'=> $title,
                'description'=>$description,
                'author_id'=>$authorId,
                'language_id'=>$language,
                'isbn'=>$isbn
            ]);
    }

}
