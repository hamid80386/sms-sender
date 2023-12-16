<?php

// config for hamid80386/sms-sender
return [
    'active' => \hamid80386\SmsSender\Services\SMS\ISMS::class,

    'isms' => [
        'username' => env('ISMS_USERNAME', 'XXX'),
        'password' => env('ISMS_PASSWORD', 'XXX'),
        'url' => env('ISMS_URL', 'XXX'),
    ],
];
