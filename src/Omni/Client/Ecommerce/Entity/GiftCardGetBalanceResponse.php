<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\ResponseInterface;

class GiftCardGetBalanceResponse implements ResponseInterface
{

    /**
     * @property float $GiftCardGetBalanceResult
     */
    protected $GiftCardGetBalanceResult = null;

    /**
     * @param float $GiftCardGetBalanceResult
     * @return $this
     */
    public function setGiftCardGetBalanceResult($GiftCardGetBalanceResult)
    {
        $this->GiftCardGetBalanceResult = $GiftCardGetBalanceResult;
        return $this;
    }

    /**
     * @return float
     */
    public function getGiftCardGetBalanceResult()
    {
        return $this->GiftCardGetBalanceResult;
    }

    /**
     * @return float
     */
    public function getResult()
    {
        return $this->GiftCardGetBalanceResult;
    }


}
