<?php

namespace App\Exceptions;

use Exception;
use App\traits\ResponseHandler;

class AppDefinedException extends Exception
{
    use ResponseHandler;

    private $responseCode = null , $responseMessage = null ;
    public function render($request)
    {

    }

    public function getResponseCode(){
        return $this->responseCode;
    }

    public function getResponseMessage(){
        return $this->responseMessage;
    }

}
