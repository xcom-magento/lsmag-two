<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use IteratorAggregate;
use ArrayIterator;

class ArrayOfItemUnitOfMeasure implements IteratorAggregate
{

    /**
     * @property ItemUnitOfMeasure[] $ItemUnitOfMeasure
     */
    protected $ItemUnitOfMeasure = [
        
    ];

    /**
     * @param ItemUnitOfMeasure[] $ItemUnitOfMeasure
     * @return $this
     */
    public function setItemUnitOfMeasure($ItemUnitOfMeasure)
    {
        $this->ItemUnitOfMeasure = $ItemUnitOfMeasure;
        return $this;
    }

    /**
     * @return ItemUnitOfMeasure[]
     */
    public function getIterator()
    {
        return new ArrayIterator( $this->ItemUnitOfMeasure );
    }

    /**
     * @return ItemUnitOfMeasure[]
     */
    public function getItemUnitOfMeasure()
    {
        return $this->ItemUnitOfMeasure;
    }


}

