<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 */


namespace Ls\Omni\Client\Loyalty\Entity;

use \Ls\Omni\Client\RequestInterface;

class BasketPostSale implements RequestInterface
{

    /**
     * @property BasketPostSaleRequest $basketRequest
     */
    protected $basketRequest = null;

    /**
     * @param BasketPostSaleRequest $basketRequest
     * @return $this
     */
    public function setBasketRequest($basketRequest)
    {
        $this->basketRequest = $basketRequest;
        return $this;
    }

    /**
     * @return BasketPostSaleRequest
     */
    public function getBasketRequest()
    {
        return $this->basketRequest;
    }


}
