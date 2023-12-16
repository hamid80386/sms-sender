<?php
namespace hamid80386\SmsSender\Facades;

use hamid80386\SmsSender\Services\SMS\ISMS;
use hamid80386\SmsSender\Services\SMS\SmsContext;
use Illuminate\Support\Facades\Facade;

/**
 * @see \hamid80386\SmsSender\SmsSender
 */
class SmsControl
{
    public static function send($data)
    {
        $sms = new SmsContext();
        $sms->sendSMS([
            'mobiles' => $data['mobile'],
            'body' => $data['body'],
        ]);
    }
}
