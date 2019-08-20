<?php

namespace App\Exceptions;


use Throwable;

class ValidationException extends AppDefinedException
{
    private $responseCode , $responseMessage ;

    public function __construct($responseCode, $responseMessage)
    {
        $this->responseCode = $responseCode;
        $this->responseMessage = $responseMessage;
    }

    public function getResponseCode(){
        return $this->responseCode;
    }

    public function getResponseMessage(){
        return $this->responseMessage;
    }
}
