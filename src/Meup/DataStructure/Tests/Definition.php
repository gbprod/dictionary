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

class Definition
{
    private $term;
    private $text;
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
