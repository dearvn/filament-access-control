# This is my package filament-access-control

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dearvn/filament-access-control.svg?style=flat-square)](https://packagist.org/packages/dearvn/filament-access-control)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/dearvn/filament-access-control/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/dearvn/filament-access-control/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/dearvn/filament-access-control/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/dearvn/filament-access-control/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/dearvn/filament-access-control.svg?style=flat-square)](https://packagist.org/packages/dearvn/filament-access-control)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require dearvn/filament-access-control
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-access-control-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-access-control-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-access-control-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentAccessControl = new Dearvn\FilamentAccessControl();
echo $filamentAccessControl->echoPhrase('Hello, Dearvn!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Donald](https://github.com/dearvn)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
