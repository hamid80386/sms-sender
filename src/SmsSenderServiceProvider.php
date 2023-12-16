<?php

namespace hamid80386\SmsSender;

use hamid80386\SmsSender\Commands\SendSmsCommand;
use hamid80386\SmsSender\Commands\SmsSenderCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

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
            ->publishesServiceProvider('SmsSenderFacadeServiceProvider')
            ->hasCommand(SmsSenderCommand::class)
            ->hasCommand(SendSmsCommand::class)
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->copyAndRegisterServiceProviderInApp()
                    ->askToStarRepoOnGitHub('hamid80386/sms-sender');
            });
    }
}
