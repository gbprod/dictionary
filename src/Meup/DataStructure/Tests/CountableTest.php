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
    Meup\DataStructure\Dictionary
;

/**
 * @author Thomas G. <thomas@1001pharmacies.com>
 */
class CountableTest extends BaseTestCase
{
    public function testCount()
    {
        $term              = new \stdClass();
        $term->label       = 'Lorem ipsum dolor sit amet';
        $definition        = new \stdClass();
        $definition->label = 'Some sample text in latin';
        $dictionary        = new Dictionary();

        $dictionary[$term] = $definition;

        $this->assertEquals(count($dictionary[$term]), 1);
    }
}