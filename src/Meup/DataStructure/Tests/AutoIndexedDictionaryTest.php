<?php

/*
 * This file is part of the Meup Dictionary library.
 *
 * (c) 1001pharmacies <http://github.com/1001pharmacies/dictionary>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Meup\DataStructure\Dictionary\Tests;

use 
    \PHPUnit_Framework_TestCase as BaseTestCase,
    Meup\DataStructure\AutoIndexedDictionary
;

/**
 * @author Thomas G. <thomas@1001pharmacies.com>
 */
class AutoIndexedDictionaryTest extends BaseTestCase
{
    public function test1()
    {
        $term       = new Term('Lorem ipsum dolor sit amet');
        $definition = new Definition($term, 'Some sample text in latin');
        $dictionary = new AutoIndexedDictionary('Meup\DataStructure\Dictionary\Tests\Definition', 'getTerm');

        $dictionary[] = $definition;

        $this->assertEquals($dictionary[$term], $definition);
    }
    public function test2()
    {
        $term       = new Term('Lorem ipsum dolor sit amet');
        $definition = new Definition($term, 'Some sample text in latin');
        $dictionary = new AutoIndexedDictionary('Meup\DataStructure\Dictionary\Tests\Definition', 'getTerm');

        $dictionary[$term] = $definition;

        $this->assertEquals($dictionary[$term], $definition);
    }
    public function test3()
    {
        $term1       = new Term('Lorem ipsum dolor sit amet');
        $definition1 = new Definition($term1, 'Some sample text in latin');
        $term2       = new Term('Lorem ipsum dolor sit amet');
        $definition2 = new Definition($term2, 'Some sample text in latin');
        $dictionary  = new AutoIndexedDictionary('Meup\DataStructure\Dictionary\Tests\Definition', 'getTerm');

        $this->setExpectedException('InvalidArgumentException');

        $dictionary[$term1] = $definition1;
        $dictionary[$term1] = $definition2;
    }
}

/** @toDo use mocks, and not this classes **/
class Term
{
    private $label;
    public function __construct($label)
    {
        $this->label = $label;
    }
    public function getLabel()
    {
        return $this->label;
    }
}

class Definition
{
    private $term, $text;
    public function __construct(Term $term, $text)
    {
        $this->term = $term;
        $this->text = $text;
    }
    public function getTerm()
    {
        return $this->term;
    }
    public function getText()
    {
        return $this->text;
    }

}
