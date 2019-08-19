<?php

namespace App\Exceptions\User;

use App\Constants\UserResponseConstant;
use App\Exceptions\AppDefinedException;

class UserException extends AppDefinedException
{
    private $responseMessage = null , $responseCode = null;

    public function __construct($exceptionType)
    {
        $this->responseMessage =UserResponseConstant::USER_EXCEPTION_CUSTOM_RESPONSE_MESSAGES[$exceptionType];
        $this->responseCode = UserResponseConstant::USER_EXCEPTION_CUSTOM_RESPONSE_CODES[$exceptionType];
    }

    public function getResponseCode(){
        return $this->responseCode;
    }

    public function getResponseMessage(){
        return $this->responseMessage;
    }

}
