Types
=====


Term Type
---------

```php
class Foo {}
class Bar {}

$foo = new Foo;
$bar = new Bar;

$dictionary = new Dictionary('\Foo');

try {
    $dictionary[$foo] = 'value for foo';
} catch (InvalidArgumentException $e) {
    echo '$foo is not a valid term for this dictionary';
}

try {
    $dictionary[$bar] = 'value for bar';
} catch (InvalidArgumentException $e) {
    echo '$bar is not a valid term for this dictionary';
}
```

Definition Type
---------------

```php
class Foo {}
class Bar {}

$foo = new Foo;
$bar = new Bar;

$dictionary = new Dictionary(null, '\Bar');

try {
    $dictionary['foo'] = $foo;
} catch (InvalidArgumentException $e) {
    echo '$foo is not a valid definition for this dictionary';
}

try {
    $dictionary['bar'] = $bar;
} catch (InvalidArgumentException $e) {
    echo '$bar is not a valid definition for this dictionary';
}
```

Complete implementation
-----------------------

```php
class myTerm {}
class myDefinition {}

$term       = new myTerm();
$definition = new myDefinition();
$dictionary = new $dictionary('\myTerm', '\myDefinition');

$dictionary[$term] = $definition;
```

To go further, you should probably see how make your own [custom dictionaries](inheritance.md)
