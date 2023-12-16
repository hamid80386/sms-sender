<?php

namespace hamid80386\SmsSender\Services\SMS;

interface SmsStrategyInterface
{
    public function send(array $data): \Illuminate\Http\Response;
}
