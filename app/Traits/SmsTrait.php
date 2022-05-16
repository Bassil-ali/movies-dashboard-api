<?php

namespace App\Traits;

trait SmsTrait
{
    public function send($message, $to)
    {
        $username = 'ykaayh';
        $password = '102030';
        $senderName = '3rod-AD';

        \Illuminate\Support\Facades\Http::get(
            "http://www.sms4ksa.com/api/sendsms.php?username=$username&password=$password&numbers=$to&message=$message&sender=$senderName&unicode=e&return=json"
        );

    }// end of send

}//end of sms trait