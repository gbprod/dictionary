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
class DictionaryTest extends BaseTestCase
{
	public function testSimple()
	{
	    $term              = new \stdClass();
	    $term->label       = 'Lorem ipsum dolor sit amet';
	    $definition        = new \stdClass();
	    $definition->label = 'Some sample text in latin';
	    $dictionary        = new Dictionary();

	    $dictionary[$term] = $definition;

	    $this->assertEquals($dictionary[$term], $definition);
	}
	public function testWithSpecifiedOffsetClass()
	{
		$term       = new \DateTime();
		$definition = uniqid();
	    $dictionary = new Dictionary('\DateTime');

	    $dictionary[$term] = $definition;
	    $this->assertEquals($dictionary[$term], $definition);

	    $this->setExpectedException('InvalidArgumentException');
	    $dictionary['non valid type'] = 'definition';
	}
	public function testWithSpecifiedOffsetClassAndScalarUsed()
	{
		$term       = uniqid();
		$definition = uniqid();
	    $dictionary = new Dictionary('\DateTime');
	    
	    $this->setExpectedException('InvalidArgumentException');
	    $dictionary[$term] = $definition;
	}
	public function testWithSpecifiedValueClass()
	{
		$term       = uniqid();
		$definition = new \DateTime();
	    $dictionary = new Dictionary(null, '\DateTime');

	    $dictionary[$term] = $definition;

	    $this->assertEquals($dictionary[$term], $definition);
	}
	public function testWithSpecifiedValueClassAndScalarUsed()
	{
	    $dictionary = new Dictionary(null, '\DateTime');

	    $this->setExpectedException('InvalidArgumentException');

	    $dictionary['term'] = 'non valid def';
	}
	public function testOffsetExists()
	{
		$term       = uniqid();
		$definition = uniqid();
	    $dictionary = new Dictionary();

	    $dictionary[$term] = $definition;

	    $this->assertTrue(isset($dictionary[$term]));
	}
	public function testUnset()
	{
		$term       = uniqid();
		$definition = uniqid();
	    $dictionary = new Dictionary();

	    $dictionary[$term] = $definition;
	    unset($dictionary[$term]);

	    $this->assertFalse($dictionary->offsetExists($term));
	}
}