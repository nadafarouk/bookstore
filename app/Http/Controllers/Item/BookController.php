<?php

namespace App\Http\Controllers\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Book\BookServiceInterface;
class BookController extends Controller
{


    public function index(BookServiceInterface $bookService){
        return $bookService->getAllBooks();
    }
}
