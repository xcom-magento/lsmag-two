<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use IteratorAggregate;
use ArrayIterator;

class ArrayOfSourcingLocation implements IteratorAggregate
{

    /**
     * @property SourcingLocation[] $SourcingLocation
     */
    protected $SourcingLocation = [
        
    ];

    /**
     * @param SourcingLocation[] $SourcingLocation
     * @return $this
     */
    public function setSourcingLocation($SourcingLocation)
    {
        $this->SourcingLocation = $SourcingLocation;
        return $this;
    }

    /**
     * @return \Traversable
     */
    public function getIterator() : \Traversable
    {
        return new ArrayIterator( $this->SourcingLocation );
    }

    /**
     * @return SourcingLocation[]
     */
    public function getSourcingLocation()
    {
        return $this->SourcingLocation;
    }


}

