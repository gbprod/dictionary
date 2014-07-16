<?php

/*
 * This file is part of the Meup Dictionary library.
 *
 * (c) 1001pharmacies <http://github.com/1001pharmacies/dictionary>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Meup\DataStructure;

/**
 * @author Thomas G. <thomas@1001pharmacies.com>
 */
class Dictionary implements \ArrayAccess
{
	/**
	 * @var array
	 */
	private $offsets = array();

	/**
	 * @var array
	 */
	private $values  = array();

	/**
	 * @var ReflectionClass
	 */
	private $offsetClass;

	/**
	 * @var ReflectionClass
	 */
	private $valueClass;

	/**
	 * @param $offsetClassName
	 * @param $valueClassName
	 * @return void
	 */
	public function __construct($offsetClassName=null, $valueClassName=null)
	{
		if ($offsetClassName) {
			$this->offsetClass = new \ReflectionClass($offsetClassName);
		}
		if ($valueClassName) {
			$this->valueClass = new \ReflectionClass($valueClassName);
		}
	}

	/**
	 * @param mixed $offset
	 * @return void
	 */
	private function checkOffset($offset)
	{
		if ($this->offsetClass && !$this->offsetClass->isInstance($offset)) {
			throw new \InvalidArgumentException();
		}
	}

	/**
	 * @param mixed $value
	 * @return void
	 */
	public function checkValue($value)
	{
		if ($this->valueClass && !$this->valueClass->isInstance($offset)) {
			throw new \InvalidArgumentException();
		}
	}

	/**
	 * @param mixed $offset
	 * @return boolean
	 * @throws InvalidArgumentException if $offset is not an instance of the restricted class
	 */
	public function offsetExists($offset) 
	{
		$this->checkOffset($offset);
		return array_key_exists($offset, $this->offsets);
	}

	/**
	 * @param mixed $offset
	 * @return mixed
	 */
	public function offsetGet($offset)
	{
		$this->checkOffset($offset);
		return $this->values[array_search($offset, $this->offsets, true)];
	}

	/**
	 * @param mixed $offset
	 * @param mixed $value
	 * @return void
	 */
	public function offsetSet($offset, $value)
	{
		$this->checkOffset($offset);
		$this->values[(array_push($this->offsets, $offset))-1] = $value;
	}

	/**
	 * @param mixed $offset
	 * @return void
	 */
	public function offsetUnset($offset) {
		$this->checkOffset($offset);
		$i = array_search($offset, $this->offsets, true);
		unset($this->offsets[$i], $this->values[$i]);
		$this->offsets = array_values($this->offsets);
		$this->values  = array_values($this->values);
	}
}
