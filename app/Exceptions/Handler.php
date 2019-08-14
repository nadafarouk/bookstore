<?php

namespace App\Exceptions;

use App\Exceptions\Book\BookNotDeletedException;
use App\Exceptions\User\InvalidUserToken;
use App\Exceptions\User\UserNotCreatedException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\Book\BookNotFoundException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        switch ($exception){
            case $exception instanceof BookNotFoundException:
                return $exception->render($request);
                break;
            case  $exception instanceof BookNotDeletedException:
                return $exception->render($request);
                break;
            case  $exception instanceof UserNotCreatedException:
                return $exception->render($request);
                break;
            case  $exception instanceof InvalidUserToken:
                return $exception->render($request);
                break;
            default :
                return parent::render($request, $exception);
        }
    }
}
