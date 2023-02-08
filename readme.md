# Product Feeder System

## requirements
- php 8.1

- Use [composer](https://getcomposer.org/).

- Use [valet](https://laravel.com/docs/9.x/valet) for local development.

## run command
```bash
composer dump-autoload
```

## use

```php
Url = http://mehmet-challenge.test
```

```php
{url}/product
```

```php
curl --location --request GET '{url}/product' \
--header 'Accept: application/xml'
```

```php
curl --location --request GET '{url}/product' \
--header 'Accept: application/json'
```
