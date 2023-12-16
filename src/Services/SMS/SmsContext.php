<?php

namespace hamid80386\SmsSender\Services\SMS;

use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class SmsContext
{
    private $strategy;

    public function __construct()
    {
        $this->strategy = new (config('sms-sender.active', \hamid80386\SmsSender\Services\SMS\ISMS::class));
    }

    public function setStrategy(SmsStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function sendSMS(array $data): \Illuminate\Http\Response
    {
        try {
            return $this->strategy->send($data);

        } catch (\Throwable $error) {
            report($error);

            return response(throw new UnprocessableEntityHttpException('There was a problem with send SMS'), 400);
        }

    }
}
