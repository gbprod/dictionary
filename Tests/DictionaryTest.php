<?php

use Meup\DataStructure\Dictionary;

class DictionaryTest extends PHPUnit_Framework_TestCase
{
	public function testSimple()
	{
	    $term        = new stdClass();
	    $term->label = 'Lorem ipsum dolor sit amet';
	    $def         = new stdClass();
	    $def->label  = 'Some sample text in latin';
	    
	    $dictionary        = new Dictionary();
	    $dictionary[$term] = $def;

	    $this->assertEquals($dictionary[$term], $def);
	}
}