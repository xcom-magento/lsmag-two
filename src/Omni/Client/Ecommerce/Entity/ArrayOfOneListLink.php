<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use IteratorAggregate;
use ArrayIterator;

class ArrayOfOneListLink implements IteratorAggregate
{

    /**
     * @property OneListLink[] $OneListLink
     */
    protected $OneListLink = [
        
    ];

    /**
     * @param OneListLink[] $OneListLink
     * @return $this
     */
    public function setOneListLink($OneListLink)
    {
        $this->OneListLink = $OneListLink;
        return $this;
    }

    /**
     * @return \Traversable
     */
    public function getIterator() : \Traversable
    {
        return new ArrayIterator( $this->OneListLink );
    }

    /**
     * @return OneListLink[]
     */
    public function getOneListLink()
    {
        return $this->OneListLink;
    }


}

