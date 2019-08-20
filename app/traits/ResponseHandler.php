<?php


namespace App\traits;


trait ResponseHandler
{

    public static  function generateJsonResponse($responseArray,$statusCode){

        return response()->json($responseArray,$statusCode);
    }

}
