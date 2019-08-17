<?php


namespace App\Services;


use Illuminate\Support\Facades\Mail;
class MailService
{

    public function sendUserMail($user,$mail)
    {
        return  Mail::to($user)->send($mail);

    }

}
