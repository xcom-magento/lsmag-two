<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use IteratorAggregate;
use ArrayIterator;

class ArrayOfReplShippingAgent implements IteratorAggregate
{

    /**
     * @property ReplShippingAgent[] $ReplShippingAgent
     */
    protected $ReplShippingAgent = [
        
    ];

    /**
     * @param ReplShippingAgent[] $ReplShippingAgent
     * @return $this
     */
    public function setReplShippingAgent($ReplShippingAgent)
    {
        $this->ReplShippingAgent = $ReplShippingAgent;
        return $this;
    }

    /**
     * @return \Traversable
     */
    public function getIterator() : \Traversable
    {
        return new ArrayIterator( $this->ReplShippingAgent );
    }

    /**
     * @return ReplShippingAgent[]
     */
    public function getReplShippingAgent()
    {
        return $this->ReplShippingAgent;
    }


}

