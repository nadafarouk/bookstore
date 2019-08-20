<?php

namespace App\Http\Controllers\Item;

use App\Http\Requests\Book\BookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Controllers\Controller;
use App\Services\Book\Interfaces\BookServiceInterface;
use App\Http\Requests\Book\StoreBookRequest;
use App\Constants\BookResponseConstant;
use App\Services\ResponseService;

class BookController extends Controller
{
    protected $bookService ;
    public function __construct(BookServiceInterface $bookService )
    {
        $this->bookService=$bookService;
    }

    public function index(BookRequest $request){
        $books = $this->bookService->getAllBooks();
        return ResponseService::generateSuccessResponse(BookResponseConstant::HTTP_STATUS_SUCCESS_OK, $books);
    }
    public function show(BookRequest $request, $bookId){
        $book = $this->bookService->getBookById($bookId);
        return ResponseService::generateSuccessResponse(BookResponseConstant::HTTP_STATUS_SUCCESS_OK, $book);
    }
    public function create(StoreBookRequest $request){
        $book = $this->bookService->createNewBook($request['title'],
                            $request['isbn'],$request['author'],
                            $request['description'],$request['language']);
        return ResponseService::generateSuccessResponse(BookResponseConstant::HTTP_STATUS_SUCCESS_CREATED, $book);
    }
    public function update(UpdateBookRequest $request, $bookId){
        $book = $this->bookService->updateBook($bookId, $request['title'],
                                                $request['isbn'],$request['author'],
                                                $request['description'],$request['language']);
        return ResponseService::generateSuccessResponse(BookResponseConstant::HTTP_STATUS_SUCCESS_OK, $book);
    }
    public function delete(BookRequest $request, $bookId){
        $this->bookService->deleteBook($bookId);
        return ResponseService::generateSuccessResponse(BookResponseConstant::HTTP_STATUS_SUCCESS_OK,
                                                                BookResponseConstant::BOOK_SUCCESS_CUSTOM_RESPONSE_MESSAGES['BOOK_DELETED']);

    }
}
