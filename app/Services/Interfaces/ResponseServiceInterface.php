<?php


namespace App\Services\Interfaces;


interface ResponseServiceInterface
{
    public function generateSuccessResponse($statusCode,$successMessage);
    public function generateErrorResponse($statusCode,$errorMessage);

}