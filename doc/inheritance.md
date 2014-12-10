Inheritance
===========

You could heritate the Dictionary class to make your own specialized dictionaries like the example below.

```php
namespace Vendor\DictionaryProject;

use Meup\DataStructure\Dictionary;

class Term 
{
    private $term;
    public function __construct($str)
    {
        $this->term = $str;
    }
    public function getTerm()
    {
        return $this->term;
    }
}

class Definition
{
    private $definition;
    public function __construct($str)
    {
        $this->definition = $str;
    }
    public function getDefinition()
    {
        return $this->definition;
    }
}

class Words extends Dictionary
{
    public function __construct()
    {
        parent::__construct(
            '\Vendor\DictionaryProject\Term', 
            '\Vendor\DictionaryProject\Definition'
        );
    }
}

$words = new Words();
try {
    $words[new Term('collection')] = new Definition('the action or process of collecting someone or something.');
    $words[new Term('dictionary')] = new Definition('a set of words or other text strings made for use in applications such as spellcheckers.');
    $words['directory']            = new Definition('a board in an organization or large store listing names and locations of departments, individuals, etc.');
} catch (InvalidArgumentException $e) {
    print("The word `directory` can't be added to your dictionary of words because is not an instance of `Term` class.");
}
```

By that way, you could be sure that a given dictionary (and his keys/values) will implements the expected interface.

```php
function printWords(Words $words)
{
    foreach ($words as $term => $definition) {
        ptrinf(
            "%s : %s\n", 
            $term->getTerm(), 
            $definition->getDefinition()
        );
    }
}
```
