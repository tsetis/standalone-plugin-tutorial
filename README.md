# This is my package standalone-plugin-tutorial

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tsetis/standalone-plugin-tutorial.svg?style=flat-square)](https://packagist.org/packages/tsetis/standalone-plugin-tutorial)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tsetis/standalone-plugin-tutorial/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tsetis/standalone-plugin-tutorial/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tsetis/standalone-plugin-tutorial/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tsetis/standalone-plugin-tutorial/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tsetis/standalone-plugin-tutorial.svg?style=flat-square)](https://packagist.org/packages/tsetis/standalone-plugin-tutorial)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require tsetis/standalone-plugin-tutorial
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="standalone-plugin-tutorial-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="standalone-plugin-tutorial-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="standalone-plugin-tutorial-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$standalonePluginTutorial = new Tsetis\StandalonePluginTutorial();
echo $standalonePluginTutorial->echoPhrase('Hello, Tsetis!');
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

- [tsetisstelios](https://github.com/tsetis)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
