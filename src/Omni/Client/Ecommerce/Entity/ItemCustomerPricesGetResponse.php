<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\ResponseInterface;

class ItemCustomerPricesGetResponse implements ResponseInterface
{
    /**
     * @property ArrayOfItemCustomerPrice $ItemCustomerPricesGetResult
     */
    protected $ItemCustomerPricesGetResult = null;

    /**
     * @param ArrayOfItemCustomerPrice $ItemCustomerPricesGetResult
     * @return $this
     */
    public function setItemCustomerPricesGetResult($ItemCustomerPricesGetResult)
    {
        $this->ItemCustomerPricesGetResult = $ItemCustomerPricesGetResult;
        return $this;
    }

    /**
     * @return ArrayOfItemCustomerPrice
     */
    public function getItemCustomerPricesGetResult()
    {
        return $this->ItemCustomerPricesGetResult;
    }

    /**
     * @return ArrayOfItemCustomerPrice
     */
    public function getResult()
    {
        return $this->ItemCustomerPricesGetResult;
    }
}

