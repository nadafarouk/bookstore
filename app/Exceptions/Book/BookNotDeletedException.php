<?php

namespace App\Exceptions\Book;

class BookNotDeletedException extends BookException
{
    private $responseCode = 404;

    public function render($request)
    {

    }
    public function getResponseMessage(){
        return [
            'error'=>'book not deleted'
        ];
    }
    public function getResponseCode()
    {
        return $this->responseCode;
    }
}
