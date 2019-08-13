<?php

namespace App\Exceptions\Book;

use App\traits\ResponseHandler;
use Exception;

class BookNotDeletedException extends Exception
{
    use ResponseHandler;
    private $responseCode = 409;

    public function render($request)
    {
        return $this->generateResponse($this->defineResponseMessage(),$this->responseCode);
    }
    private function defineResponseMessage(){
        return [
            'error'=>'book not deleted'
        ];
    }
}
