<?php

namespace App\Exceptions\User;

use Exception;
use App\traits\ResponseHandler;

class UserNotCreatedException extends Exception
{
    use ResponseHandler;
    private $responseCode = 403;

    public function render($request)
    {
        return $this->generateResponse($this->defineResponseMessage(),$this->responseCode);
    }
    private function defineResponseMessage(){
        return [
            'error'=>'user was not created'
        ];
    }
}
