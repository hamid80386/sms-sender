<?php

namespace hamid80386\SmsSender\Commands;

use hamid80386\SmsSender\Services\SMS\ISMS;
use hamid80386\SmsSender\Services\SMS\SmsContext;
use Illuminate\Console\Command;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class SendSmsCommand extends Command
{
    //If we wanted to use of option instead of arguments
    //public $signature = 'send-sms {--mobile=} {--body=}';

    public $signature = 'send-sms {mobile} {--body=}';

    public $description = 'Send Sms with config';

    public function handle(): int
    {
        try{
            $sms = new SmsContext(new ISMS());
            $sms->sendSMS([
                'mobiles' => $this->argument('mobile'),
                'body' => ($this->option('body')!=null? $this->option('body') : 'test message'),
                //'body' => ($this->argument('body')!=null? $this->argument('body') : 'test message'),
            ]);
            $this->comment('Message Sent!');
            return self::SUCCESS;
        }catch (\Throwable $error){
            report($error);
            echo ('There was a problem with send SMS!!!!!!!!!');
            return self::FAILURE;
        }
    }
}
