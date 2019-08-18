<?php

namespace App\Exceptions\Book;

use Exception;

class BookNotCreatedException extends BookException
{
    private $responseCode = 404 ;
    private $responseMessage = 'book not created' ;

    public function render($request)
    {

    }
    public function getResponseMessage(){
        return $this->responseMessage ;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }
}
