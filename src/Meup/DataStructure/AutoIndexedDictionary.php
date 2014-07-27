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
class AutoIndexedDictionary extends Dictionary
{
    /**
     * @var ReflectionMethod
     */
    private $offsetMethod;

    /**
     * @var array
     */
    private $offsetArgs;

    /**
     * @param string $valueClassName
     * @param string $offsetMethod
     * @param array $offsetArgs
     * @return void
     */
    public function __construct($valueClassName, $offsetMethod, array $offsetArgs = array())
    {
        $this->offsetMethod = new \ReflectionMethod($valueClassName, $offsetMethod);
        $this->offsetArgs   = $offsetArgs;
        parent::__construct(null, $valueClassName);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @param mixed
     */
    public function offsetSet($offset, $value)
    {
        $valueOffset = $this
            ->offsetMethod
            ->invoke($value, $this->offsetArgs)
        ;
        $this->checkValue($value);
        if (!is_null($offset) && $offset!==$valueOffset) {
            throw new \InvalidArgumentException();
        }
        return parent::offsetSet(
            $valueOffset,
            $value
        );
    }
}
