# PSR-20 System Clock Library

[![Packagist](https://img.shields.io/packagist/v/arokettu/system-clock.svg?style=flat-square)](https://packagist.org/packages/arokettu/system-clock)
[![PHP](https://img.shields.io/packagist/php-v/arokettu/system-clock.svg?style=flat-square)](https://packagist.org/packages/arokettu/system-clock)
[![Packagist](https://img.shields.io/github/license/arokettu/php-system-clock.svg?style=flat-square)](LICENSE.md)

The smallest possible [PSR-20](https://www.php-fig.org/psr/psr-20/) implementation for the case when you don't need
all the fancy testing clock classes.

## Installation

```bash
composer require 'arokettu/system-clock'
```

## Example

```php
<?php

$clock = new \Arokettu\SystemClock\SystemClock();
$clockPsrAwareValidator->isValid($clock);
```

For a specific example, `lcobucci/jwt`:

```php
use Arokettu\SystemClock\SystemClock;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;

$cfg = Configuration::forSymmetricSigner(new Sha256(), '...');
$token = $cfg->parser()->parse('...');

$cfg->validator()->assert(
    $token,
    new StrictValidAt(new SystemClock())
);
```

## Support

Please file issues on our main repo at GitLab: <https://gitlab.com/sandfox/php-system-clock/-/issues>

## License

The library is available as open source under the terms of the [MIT No Attribution License](LICENSE.md).
