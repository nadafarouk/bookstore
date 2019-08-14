<?php

namespace App\Exceptions\User;

use App\traits\ResponseHandler;
use Exception;

class InvalidUserToken extends Exception
{
    use ResponseHandler;
    private $responseCode = 403;

    public function render($request)
    {
        return $this->generateResponse($this->defineResponseMessage(),$this->responseCode);
    }
    private function defineResponseMessage(){
        return [
            'error'=>'invalid token'
        ];
    }
}
