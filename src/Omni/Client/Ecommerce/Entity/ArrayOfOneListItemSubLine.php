<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use IteratorAggregate;
use ArrayIterator;

class ArrayOfOneListItemSubLine implements IteratorAggregate
{

    /**
     * @property OneListItemSubLine[] $OneListItemSubLine
     */
    protected $OneListItemSubLine = [
        
    ];

    /**
     * @param OneListItemSubLine[] $OneListItemSubLine
     * @return $this
     */
    public function setOneListItemSubLine($OneListItemSubLine)
    {
        $this->OneListItemSubLine = $OneListItemSubLine;
        return $this;
    }

    /**
     * @return OneListItemSubLine[]
     */
    public function getIterator()
    {
        return new ArrayIterator( $this->OneListItemSubLine );
    }

    /**
     * @return OneListItemSubLine[]
     */
    public function getOneListItemSubLine()
    {
        return $this->OneListItemSubLine;
    }


}
