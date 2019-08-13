<?php


namespace App\traits;


trait ResponseHandler
{

    public function generateResponse($responseArray,$statusCode){
        return response()->json($responseArray,$statusCode);
    }

}
