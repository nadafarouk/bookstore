<?php

namespace App\Exceptions\Book;

class BookNotDeletedException extends BookException
{
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
