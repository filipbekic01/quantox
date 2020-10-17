# Quantox

## Requirements

Local machine needs `PHP-FPM` installed. Application is test on `PHP 7.4.10` version.

Database is not used because of simplicity of project. Therefore repositories will mock data.

## Install

Generate dependencies.

```
composer install
```

## Run

Use Symfony server to run application instead of NGINX or Apache.

```
./server server:start --port=5005 --dir=web
```

## Test

There are two trivial tests but they work, you can execute them.

```
php vendor/bin/phpunit
```