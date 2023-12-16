<?php

namespace hamid80386\SmsSender\Services\SMS;

use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class ISMS implements SmsStrategyInterface
{
    public function send(array $data): \Illuminate\Http\Response
    {
        try {
            // $data should contain these keys: [mobiles, body]
            $data = array_merge($data, [
                'username' => config('sms-sender.isms.username'),
                'password' => config('sms-sender.isms.password'),
                'api_url' => config('sms-sender.isms.url'),
            ]);
            $url = $data['api_url'];
            $data = http_build_query($data);

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            $result = curl_exec($ch);

            if (! property_exists(json_decode($result), 'ids')) {
                return response('اختلالی در شبکه به وجود آمده است', 403);
            } else {
                return response('SMS has already been sent.', 200);
            }

        } catch (\Throwable $error) {
            report($error);

            return response(throw new UnprocessableEntityHttpException('There was a problem with send sms'), 400);
        }
    }
}
