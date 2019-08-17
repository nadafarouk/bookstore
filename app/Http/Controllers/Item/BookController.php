<?php

namespace App\Http\Controllers\Item;

use App\Http\Requests\Book\BookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Controllers\Controller;
use App\Services\Book\Interfaces\BookServiceInterface;
use App\Http\Requests\Book\StoreBookRequest;

class BookController extends Controller
{
    protected $bookService;
    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService=$bookService;
    }

    public function index(BookRequest $request){
        return $this->bookService->getAllBooks();
    }
    public function show(BookRequest $request, $bookId){
        return $this->bookService->getBookById($bookId);
    }
    public function create(StoreBookRequest $request){
       return $this->bookService->createNewBook($request['title'],
                            $request['isbn'],$request['author'],
                            $request['description'],$request['language']);
    }
    public function update(UpdateBookRequest $request, $bookId){
        return $this->bookService->updateBook($bookId, $request['title'],
            $request['isbn'],$request['author'],
            $request['description'],$request['language']);
    }
    public function delete(BookRequest $request, $bookId){
        return $this->bookService->deleteBook($bookId);
    }
}
