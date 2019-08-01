# External Url Validator for Laravel Nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kukac7/external-url-validator.svg?style=flat-square)](https://packagist.org/packages/kukac7/external-url-validator)

## Demo

![external-url-validator demo](https://media.giphy.com/media/hsZiRKi96Ppw1S58tU/giphy.gif)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require kukac7/external-url-validator
```

## Usage
Add a new `ExternalUrlValidator` field to your Nova Resource:

```php
use Kukac7\ExternalUrlValidator\ExternalUrlValidator;

class Link extends Resource
{
    // ...

    public function fields(Request $request)
    {
        return [
            // ...

            ExternalUrlValidator::make('URL', 'url'),

            // ...
        ];
    }
}
```

## Options

### API Url

Set custom validate API url:

```php
ExternalUrlValidator::make('URL', 'url')->apiUrl('http://example.test/api/validate-url'),
```

## Security

If you discover any security related issues, please using the issue tracker.

## Credits

- [kukac7](https://github.com/kukac7)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Acknowledgments

Special thanks to:

- [Robert Dezso](https://github.com/drobee)
