<?php


namespace App\Services\Interfaces;


interface ResponseServiceInterface
{
    public static function generateSuccessResponse($statusCode,$successMessage);
    public static function generateErrorResponse($statusCode,$errorMessage);

}