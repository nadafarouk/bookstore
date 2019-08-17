<?php

namespace App\Exceptions\Book;


class BookNotFoundException extends BookException
{
    private $responseCode = 404;

    public function render($request)
    {
        return $this->generateResponse($this->defineResponseMessage(),$this->responseCode);
    }
    private function defineResponseMessage(){
        return [
            'error'=>'book not found'
        ];
    }

}
