<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\ResponseInterface;

class ContactUpdateResponse implements ResponseInterface
{

    /**
     * @property MemberContact $ContactUpdateResult
     */
    protected $ContactUpdateResult = null;

    /**
     * @param MemberContact $ContactUpdateResult
     * @return $this
     */
    public function setContactUpdateResult($ContactUpdateResult)
    {
        $this->ContactUpdateResult = $ContactUpdateResult;
        return $this;
    }

    /**
     * @return MemberContact
     */
    public function getContactUpdateResult()
    {
        return $this->ContactUpdateResult;
    }

    /**
     * @return MemberContact
     */
    public function getResult()
    {
        return $this->ContactUpdateResult;
    }


}

