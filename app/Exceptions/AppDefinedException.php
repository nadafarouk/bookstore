<?php

namespace App\Exceptions;

use Exception;
use App\traits\ResponseHandler;

class AppDefinedException extends Exception
{
    use ResponseHandler;
    public function render($request){

    }
}
