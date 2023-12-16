# A simple Laravel Package to send sms based on Strategy and Facade design patterns.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hamid80386/sms-sender.svg?style=flat-square)](https://packagist.org/packages/hamid80386/sms-sender)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hamid80386/sms-sender/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hamid80386/sms-sender/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/hamid80386/sms-sender/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/hamid80386/sms-sender/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hamid80386/sms-sender.svg?style=flat-square)](https://packagist.org/packages/hamid80386/sms-sender)

First, follow install instructions. It's simple!

## Installation
1: In your composer.json file add followings:
```bash
"repositories": [
        {
            "url": "https://github.com/hamid80386/pkg2",
            "type": "git"
        }
    ],
```
and
```bash
"require": {
  ...
  "hamid80386/sms-sender": "^1.0",
  ...
}
```

Then you can install the package via composer:

```bash
composer require hamid80386/sms-sender
```

2: publish the service provider file with:

```bash
php artisan vendor:publish --tag="sms-sender-provider"
```

3: Run install command:

```bash
php artisan sms-sender:install
```

This is the contents of the published config file:

```php
return [
    'active' => \hamid80386\SmsSender\Services\SMS\ISMS::class,

    'isms' => [
        'username' => env('ISMS_USERNAME', 'XXX'),
        'password' => env('ISMS_PASSWORD', 'XXX'),
        'url' => env('ISMS_URL', 'XXX'),
    ],
];
```
You should change them based on you strategy class for sending sms.
- Default class for sending sms is indicated with "active" property.


## Usage

```php
smssend::send(['mobile'=>'NUMBER','body'=>'hello world']);
// OR
$sms = new SmsContext();
$sms->sendSMS([
    'mobiles' => 'mobile number',
    'body' => 'body',
]);

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Hamid Abbasi](https://github.com/hamid80386)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
