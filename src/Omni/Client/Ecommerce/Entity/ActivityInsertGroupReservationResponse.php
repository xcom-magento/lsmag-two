<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\ResponseInterface;

class ActivityInsertGroupReservationResponse implements ResponseInterface
{

    /**
     * @property string $ActivityInsertGroupReservationResult
     */
    protected $ActivityInsertGroupReservationResult = null;

    /**
     * @param string $ActivityInsertGroupReservationResult
     * @return $this
     */
    public function setActivityInsertGroupReservationResult($ActivityInsertGroupReservationResult)
    {
        $this->ActivityInsertGroupReservationResult = $ActivityInsertGroupReservationResult;
        return $this;
    }

    /**
     * @return string
     */
    public function getActivityInsertGroupReservationResult()
    {
        return $this->ActivityInsertGroupReservationResult;
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->ActivityInsertGroupReservationResult;
    }


}
