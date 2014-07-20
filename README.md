# Facebook PHP SDK Wrapper for CLI 

[![Build Status](https://travis-ci.org/jbboehr/facebook-php-cli.png?branch=master)](https://travis-ci.org/jbboehr/facebook-php-cli)
[![HHVM Status](http://hhvm.h4cc.de/badge/jbboehr/facebook-php-cli.png)](http://hhvm.h4cc.de/package/jbboehr/facebook-php-cli)

This class just wraps the Facebook PHP SDK so that it may be used from
the command line without exploding.

## Installation

With [composer](http://getcomposer.org)

```json
{
    "require": {
        "jbboehr/facebook-php-cli": "~1.0.0"
    }
}
```

## Usage

With [composer](http://getcomposer.org)

```php
require 'vendor/autoload.php';
$facebook = new CliFacebook(array(
  'appId' => $appId,
  'secret' => $secret,
));
```
