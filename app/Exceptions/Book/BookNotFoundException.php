<?php

namespace App\Exceptions\Book;


class BookNotFoundException extends BookException
{
    private $responseCode = 404;

    public function render($request)
    {

    }

    public function getResponseMessage(){
        return [
            'error'=>'book not found'
        ];
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }

}
