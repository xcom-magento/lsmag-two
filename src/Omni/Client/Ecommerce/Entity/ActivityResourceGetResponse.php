<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\ResponseInterface;

class ActivityResourceGetResponse implements ResponseInterface
{

    /**
     * @property ArrayOfActivityResource $ActivityResourceGetResult
     */
    protected $ActivityResourceGetResult = null;

    /**
     * @param ArrayOfActivityResource $ActivityResourceGetResult
     * @return $this
     */
    public function setActivityResourceGetResult($ActivityResourceGetResult)
    {
        $this->ActivityResourceGetResult = $ActivityResourceGetResult;
        return $this;
    }

    /**
     * @return ArrayOfActivityResource
     */
    public function getActivityResourceGetResult()
    {
        return $this->ActivityResourceGetResult;
    }

    /**
     * @return ArrayOfActivityResource
     */
    public function getResult()
    {
        return $this->ActivityResourceGetResult;
    }


}
