<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\ResponseInterface;

class ActivityGetByResourceResponse implements ResponseInterface
{

    /**
     * @property ArrayOfBooking $ActivityGetByResourceResult
     */
    protected $ActivityGetByResourceResult = null;

    /**
     * @param ArrayOfBooking $ActivityGetByResourceResult
     * @return $this
     */
    public function setActivityGetByResourceResult($ActivityGetByResourceResult)
    {
        $this->ActivityGetByResourceResult = $ActivityGetByResourceResult;
        return $this;
    }

    /**
     * @return ArrayOfBooking
     */
    public function getActivityGetByResourceResult()
    {
        return $this->ActivityGetByResourceResult;
    }

    /**
     * @return ArrayOfBooking
     */
    public function getResult()
    {
        return $this->ActivityGetByResourceResult;
    }


}
