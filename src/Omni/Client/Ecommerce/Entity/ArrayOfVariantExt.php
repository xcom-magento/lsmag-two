<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use IteratorAggregate;
use ArrayIterator;

class ArrayOfVariantExt implements IteratorAggregate
{
    /**
     * @property VariantExt[] $VariantExt
     */
    protected $VariantExt = [
        
    ];

    /**
     * @param VariantExt[] $VariantExt
     * @return $this
     */
    public function setVariantExt($VariantExt)
    {
        $this->VariantExt = $VariantExt;
        return $this;
    }

    /**
     * @return \Traversable
     */
    public function getIterator() : \Traversable
    {
        return new ArrayIterator( $this->VariantExt );
    }

    /**
     * @return VariantExt[]
     */
    public function getVariantExt()
    {
        return $this->VariantExt;
    }
}

