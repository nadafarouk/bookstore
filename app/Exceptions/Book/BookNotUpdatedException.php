<?php

namespace App\Exceptions\Book;



class BookNotUpdatedException extends BookException
{
    private $responseCode = 404;

    public function render($request)
    {

    }
    public function getResponseMessage(){
        return [
            'error'=>'book not updated'
        ];
    }
    public function getResponseCode()
    {
        return $this->responseCode;
    }
}
