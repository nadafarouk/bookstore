<?php


namespace App\Services;


use App\Constants\BookResponseConstant;
use App\Services\Interfaces\ResponseServiceInterface;
use App\traits\ResponseHandler;

class ResponseService implements ResponseServiceInterface
{
    use ResponseHandler;

    public function generateSuccessResponse($statusCode,$successMessage)
    {
        $response = [
            'status'=> BookResponseConstant::API_SUCCESS_STATUS ,
            'success'=> $successMessage
        ];
        return $this->generateResponse($response,$statusCode);
    }

    public function generateErrorResponse($statusCode,$errorMessage){
        $response = [
            'status' => BookResponseConstant::API_ERROR_STATUS ,
            'error' => $errorMessage
        ];
        return $this->generateResponse($response,$statusCode);
    }

}