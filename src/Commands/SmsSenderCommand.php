<?php

namespace hamid80386\SmsSender\Commands;

use Illuminate\Console\Command;

class SmsSenderCommand extends Command
{
    public $signature = 'sms-sender';

    public $description = 'Send SMS via console';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
