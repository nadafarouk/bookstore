<?php

namespace App\Http\Controllers\Item;

use App\Events\ExceptionThrown;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Book\BookServiceInterface;
use App\Http\Requests\Book\StoreBookRequest;

class BookController extends Controller
{
    protected $bookService;
    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService=$bookService;
    }

    public function index(){
        return $this->bookService->getAllBooks();
    }
    public function show($id){
        return $this->bookService->getBookById($id);
    }
    public function store(StoreBookRequest $request){
       return $this->bookService->createNewBook($request['title'],
                            $request['isbn'],$request['author'],
                            $request['description'],$request['language']);
    }
    public function update(UpdateBookRequest $request,$id){
        return $this->bookService->updateBook($id,$request['title'],
            $request['isbn'],$request['author'],
            $request['description'],$request['language']);
    }
    public function delete($id){
        return $this->bookService->deleteBook($id);
    }
}
