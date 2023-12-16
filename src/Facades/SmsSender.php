<?php

namespace hamid80386\SmsSender\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \hamid80386\SmsSender\SmsSender
 */
class SmsSender extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \hamid80386\SmsSender\SmsSender::class;
    }
}
