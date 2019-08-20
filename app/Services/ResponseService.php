<?php


namespace App\Services;


use App\Constants\HttpResponseConstant;
use App\Services\Interfaces\ResponseServiceInterface;
use App\traits\ResponseHandler;

class ResponseService implements ResponseServiceInterface
{
    use ResponseHandler;

    public static function generateSuccessResponse($statusCode,$successMessage)
    {
        $response = [
            'status'=> HttpResponseConstant::API_SUCCESS_STATUS ,
            'success'=> $successMessage
        ];
        return ResponseHandler::generateJsonResponse($response,$statusCode);
    }

    public static function generateErrorResponse($statusCode,$errorMessage){
        $response = [
            'status' => HttpResponseConstant::API_ERROR_STATUS ,
            'error' => $errorMessage
        ];
        return ResponseHandler::generateJsonResponse($response,$statusCode);
    }



}