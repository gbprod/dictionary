<?php

/*
 * This file is part of the Meup Dictionary library.
 *
 * (c) 1001pharmacies <http://github.com/1001pharmacies/dictionary>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Meup\DataStructure\Tests;

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
