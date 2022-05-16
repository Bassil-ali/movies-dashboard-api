<?php

namespace App\Lib;

class NotifyMobile
{
    private static $to = [];
    private static $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
    private static $key = "AAAAWqaqUiw:APA91bGDapj0N9wS4R8a9WhR78eZWnF_hgiu0fsLOAvD8UZ16WIP_9VTocXgMA-vxf15e-fMrONJdN3QeLq-kM-oVG4vCOS5UGfLgeZXaHiKCQfOrY3M3dAmD2a8888zKaKO0ONqgRps";
    private static $headers = [];
    private static $fcmNotification = [];

    private static function prepare()
    {
        self::$headers = ['Authorization: key=' . self::$key, 'Content-Type: application/json'];
    }

    public static function data($to, $title, $body, $url = null)
    {
        if (is_array($to)) {
            self::$to = $to;
        } else {
            self::$to[] = $to;
        }

        $notificationData = [
            'title' => $title,
            'body' => $body,
            'icon' => 'myIcon',
            'vibrate' => '1',
            'sound' => '1'
        ];

        self::$fcmNotification = [
            'registration_ids' => self::$to,
            'notification' => $notificationData,
            'data' => ['customUrl' => $url]
        ];

    }//end of data

    public static function send($to, $title, $body, $link = null)
    {
        self::prepare();
        self::data($to, $title, $body, $link);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, self::$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(self::$fcmNotification));
        $result = curl_exec($ch);

        curl_close($ch);

        return $result;

    }//end of send

}//end of class

?>