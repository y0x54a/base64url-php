# base64url-php
[![packagist](https://img.shields.io/packagist/v/y0x54a/base64url-php)](https://packagist.org/packages/y0x54a/base64url-php)
[![Build Status](https://github.com/y0x54a/base64url-php/workflows/ci/badge.svg?branch=main)](https://github.com/y0x54a/base64url-php/actions)
[![codecov](https://codecov.io/gh/y0x54a/base64url-php/branch/main/graph/badge.svg?token=FZGTEFC1NL)](https://codecov.io/gh/y0x54a/base64url-php)

## Installing
```sh
composer require y0x54a/base64url-php
```

## Example
```php
use Y0x54a\Base64url\Base64url;
```

```php
Base64url::encode('foo bar baz');
// Zm9vIGJhciBiYXo
```

```php
Base64url::decode('Zm9vIGJhciBiYXo');
// foo bar baz
```

```php
Base64url::validate('Zm9vIGJhciBiYXo=');
// true
```

```php
Base64url::validate('Zm9vIGJhciBiYXo===');
// false
```

```php
Base64url::convertBase64ToBase64url('77+/');
// 77-_
```

```php
Base64url::convertBase64urlToBase64('77-_');
// 77+/
```

## API

- `encode(string $value): string`

- `decode(string $base64url): string`

- `validate(string $base64url): bool`

- `convertBase64ToBase64url(string $base64): string`

- `convertBase64urlToBase64(string $base64url): string`