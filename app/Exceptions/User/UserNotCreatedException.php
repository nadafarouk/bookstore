<?php

namespace App\Exceptions\User;


class UserNotCreatedException extends UserException
{

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
