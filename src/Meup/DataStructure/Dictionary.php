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
class Dictionary implements \Iterator, \Countable, \ArrayAccess
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
     * @var integer
     */
    private $position = 0;

    /**
     * @param $offsetClassName
     * @param $valueClassName
     * @return void
     */
    public function __construct($offsetClassName = null, $valueClassName = null)
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
    protected function checkOffset($offset)
    {
        if ($this->offsetClass && (!is_object($offset) || !$this->offsetClass->isInstance($offset))) {
            throw new \InvalidArgumentException();
        }
    }

    /**
     * @param mixed $value
     * @return void
     */
    protected function checkValue($value)
    {
        if ($this->valueClass && (!is_object($value) || !$this->valueClass->isInstance($value))) {
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
        return in_array($offset, $this->offsets);
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
        $this->checkValue($value);
        $this->values[(array_push($this->offsets, $offset))-1] = $value;
    }

    /**
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        $this->checkOffset($offset);
        $i = array_search($offset, $this->offsets, true);
        unset($this->offsets[$i], $this->values[$i]);
        $this->offsets = array_values($this->offsets);
        $this->values  = array_values($this->values);
    }

    /**
     * @return integer
     */
    public function count()
    {
        return count($this->values);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->values[$this->position];
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return $this->offsets[$this->position];
    }

    /**
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return boolean
     */
    public function valid()
    {
        return isset($this->offsets[$this->position]);
    }
}
