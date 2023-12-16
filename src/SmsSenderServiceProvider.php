<?php

namespace hamid80386\SmsSender;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use hamid80386\SmsSender\Commands\SmsSenderCommand;

class SmsSenderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('sms-sender')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_sms-sender_table')
            ->hasCommand(SmsSenderCommand::class);
    }
}