Dictionary Class
================

A simple class to manipulate Dictionary datastructures within PHP.

Installation
------------

First, you need composer. Download it :

    curl -sS https://getcomposer.org/installer | php

Look if he's installed :

    php composer.phar

And then install the project :

    php composer.phar install

In the composer.json of your project, add :

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/1001Pharmacies/dictionary.git"
        }
    ],
    "require": {
        "1001pharmacies/dictionary": ">=1.0-dev"
    }

Usage example
------------- 

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

You could use a dictionary with [type restriction](doc/types.md).

Running Tests
-------------

To run tests, execute the command :

    vendor/bin/phpunit

Or you could use your global installation of PHPUnit to do so.
