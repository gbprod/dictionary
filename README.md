Dictionary
==========

[![Build Status](https://secure.travis-ci.org/1001Pharmacies/dictionary.svg?branch=master)](http://travis-ci.org/1001Pharmacies/dictionary) [![Total Downloads](https://poser.pugx.org/1001Pharmacies/dictionary/downloads.png)](https://packagist.org/packages/1001Pharmacies/dictionary) [![Latest Stable Version](https://poser.pugx.org/1001Pharmacies/dictionary/v/stable.png)](https://packagist.org/packages/1001Pharmacies/dictionary)

A simple class to manipulate Dictionary datastructures within PHP.

You probably dreamed one day to use objects as array indexes. So, that's what this library does.

```php
$dictionary[new YourClass()] = '';
```

Installation
------------

First, you need composer. Download it :

```bash
curl -sS https://getcomposer.org/installer | php
```

Look if he's installed :

```bash
php composer.phar
```

And then install the project :

```bash
php composer.phar install
```

In the composer.json of your project, add :

```json
"require": {
    "1001pharmacies/dictionary": "0.*"
}
```

Usage example
------------- 

```php
<?php 
// example.php

require __DIR__.'/vendor/autoload.php';

use Meup\DataStructure\Dictionary;

$term              = new stdClass();
$term->label       = 'Lorem ipsum dolor sit amet';

$definition        = new stdClass();
$definition->label = 'Some sample text in latin';

$dictionary        = new Dictionary();
$dictionary[$term] = $definition;
```

You could use a dictionary with [type restriction](doc/types.md).

Running Tests
-------------

To run tests, execute the command :

```bash
vendor/bin/phing test
```

Compatibility
-------------

You need to use `PHP 5.5` (or greater version) to enjoy this library. The `Iterator::key()` method could not return anything else than a scalar value ([read more about this](http://php.net/manual/fr/iterator.key.php#112530)).