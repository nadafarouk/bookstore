<?php


namespace App\Constants;


class BookResponseConstant extends HttpResponseConstant
{

    const BOOK_SUCCESS_CUSTOM_RESPONSE_MESSAGES = [

        'BOOK_DELETED'=>'book deleted successfully' ,

    ];

    const BOOK_EXCEPTION_CUSTOM_RESPONSE_CODES = [
        'BOOK_NOT_FOUND' => self::HTTP_STATUS_ERROR_NOT_FOUND ,
        'BOOK_NOT_CREATED'  => self::HTTP_STATUS_ERROR_NOT_FOUND ,
        'BOOK_NOT_UPDATED' => self::HTTP_STATUS_ERROR_NOT_FOUND ,
        'BOOK_NOT_DELETED' => self::HTTP_STATUS_ERROR_NOT_FOUND ,

    ];

    const BOOK_EXCEPTION_CUSTOM_RESPONSE_MESSAGES = [
        'BOOK_NOT_FOUND' => 'book was not found' ,
        'BOOK_NOT_CREATED'  => 'book was not created' ,
        'BOOK_NOT_UPDATED' => 'book was not updated' ,
        'BOOK_NOT_DELETED' => 'book was not deleted' ,


    ];


}