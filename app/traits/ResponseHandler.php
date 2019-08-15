<?php


namespace App\traits;


trait ResponseHandler
{

    public function generateResponse($responseArray,$statusCode){
        return response()->json($responseArray,$statusCode);
    }

    public function generateEmailSentResponse()
    {
        return $this->generateResponse(['success'=>'email sent successfully'],200);
    }
}
