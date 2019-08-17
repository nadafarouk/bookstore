<?php

namespace App\Exceptions\User;

class InvalidUserToken extends UserException
{
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
