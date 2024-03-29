# Lumen SparkPost

[![Test](https://github.com/digiaonline/lumen-sparkpost/actions/workflows/test.yml/badge.svg)](https://github.com/digiaonline/lumen-sparkpost/actions/workflows/test.yml)
[![Coverage Status](https://coveralls.io/repos/github/digiaonline/lumen-sparkpost/badge.svg)](https://coveralls.io/github/digiaonline/lumen-sparkpost)
[![Code Climate](https://codeclimate.com/github/nordsoftware/lumen-sparkpost/badges/gpa.svg)](https://codeclimate.com/github/nordsoftware/lumen-sparkpost)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/digiaonline/lumen-sparkpost/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/digiaonline/lumen-sparkpost/?branch=main)
[![Latest Stable Version](https://poser.pugx.org/nordsoftware/lumen-sparkpost/version)](https://packagist.org/packages/nordsoftware/lumen-sparkpost)
[![Total Downloads](https://poser.pugx.org/nordsoftware/lumen-sparkpost/downloads)](https://packagist.org/packages/nordsoftware/lumen-sparkpost)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

[SparkPost](http://www.sparkpost.com/) module for the [Lumen PHP framework](http://lumen.laravel.com/).

## Requirements

- PHP 5.6 or newer
- [Lumen](https://lumen.laravel.com/) 5.1 or newer
- [Composer](http://getcomposer.org)

## Setup

### Installation

Run the following command to install the package through Composer:

```sh
composer require nordsoftware/lumen-sparkpost
```

### Configure

Copy the configuration template in `config/sparkpost.php` to your application's `config` directory and modify according to your needs. 
For more information see the [Configuration Files](http://lumen.laravel.com/docs/configuration#configuration-files) section in the Lumen documentation.

The only required config is the API `key`, which you can get on your SparkPost account pages. Please note that the 
default configuration uses synchronous sending mode. If you want to change that, set the `async` option to `true` 
instead.

### Bootstrapping

Add the following lines to `bootstrap/app.php`:

```php
$app->register(Nord\Lumen\SparkPost\SparkPostServiceProvider::class);
```

## Usage

You can now use `Nord\Lumen\SparkPost\SparkPostService` to access SparkPost anywhere in your application.

```php
public function sendEmail(SparkPostService $sparkpost) {
    $results = $sparkpost->send([
        'from' => [
            'name' => 'From Envelope',
            'email' => 'from@sparkpostbox.com',
        ],
        'recipients' => [
            [
                'address' => [
                    'email' => 'john.doe@example.com',
                ],
            ],
        ],
        'template' => 'my-first-email',
    ]);
}
```

## Contributing

Please read the [guidelines](.github/CONTRIBUTING.md).

## Running tests

Clone the project and install its dependencies by running:

```sh
composer install
```

Run the following command to run the test suite:

```sh
vendor/bin/codecept run unit
```

## License

MIT, see [LICENSE](LICENSE).
