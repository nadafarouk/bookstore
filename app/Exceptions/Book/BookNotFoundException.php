<?php

namespace App\Exceptions\Book;

use Exception;
use App\traits\ResponseHandler;

class BookNotFoundException extends Exception
{
    use ResponseHandler;
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
