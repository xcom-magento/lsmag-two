<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\RequestInterface;

class ReplEcommItemVariants implements RequestInterface
{
    /**
     * @property ReplRequest $replRequest
     */
    protected $replRequest = null;

    /**
     * @param ReplRequest $replRequest
     * @return $this
     */
    public function setReplRequest($replRequest)
    {
        $this->replRequest = $replRequest;
        return $this;
    }

    /**
     * @return ReplRequest
     */
    public function getReplRequest()
    {
        return $this->replRequest;
    }
}

