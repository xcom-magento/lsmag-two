<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

class CouponDetails
{

    /**
     * @property string $CouponId
     */
    protected $CouponId = null;

    /**
     * @property string $Description
     */
    protected $Description = null;

    /**
     * @property string $LineNumber
     */
    protected $LineNumber = null;

    /**
     * @param string $CouponId
     * @return $this
     */
    public function setCouponId($CouponId)
    {
        $this->CouponId = $CouponId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCouponId()
    {
        return $this->CouponId;
    }

    /**
     * @param string $Description
     * @return $this
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $LineNumber
     * @return $this
     */
    public function setLineNumber($LineNumber)
    {
        $this->LineNumber = $LineNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getLineNumber()
    {
        return $this->LineNumber;
    }


}
