<?php

namespace App\Exceptions;

use App\Services\ResponseService;
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

    public function generateExceptionResponse($responseCode, $responseMessage)
    {
        $responseService = new ResponseService ;
        return $responseService->generateErrorResponse($responseCode,$responseMessage);
    }
}
