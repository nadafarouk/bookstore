<?php

namespace App\Exceptions\Book;

use App\Exceptions\AppDefinedException;
use Throwable;
use App\Constants\BookResponseConstant;

class  BookException extends AppDefinedException
{
    private $responseMessage = null , $responseCode = null;

    public function __construct($exceptionType)
    {
        $this->responseMessage = BookResponseConstant::BOOK_EXCEPTION_CUSTOM_RESPONSE_MESSAGES[$exceptionType];
        $this->responseCode = BookResponseConstant::BOOK_EXCEPTION_CUSTOM_RESPONSE_CODES[$exceptionType];
    }

    public function getResponseCode(){
        return $this->responseCode;
    }

    public function getResponseMessage(){
        return $this->responseMessage;
    }

}
