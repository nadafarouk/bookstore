<?php

namespace App\Exceptions;


use App\Services\ResponseService;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Spatie\Permission\Exceptions\UnauthorizedException;
use App\traits\ResponseHandler;
use App\Events\ExceptionThrownEvent;
class Handler extends ExceptionHandler
{
    use ResponseHandler;
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
    public function render($request, Exception $exception )
    {
        switch ($exception){
            case $exception instanceof AppDefinedException:
                return $exception->generateExceptionResponse($exception->getResponseCode(), $exception->getResponseMessage());
                break;
            case $exception instanceof UnauthorizedException:
                return $this->generateUnauthorizedResponse();
                break;
            default :
                event(new ExceptionThrownEvent());
                return parent::render($request, $exception);
        }
    }
}
