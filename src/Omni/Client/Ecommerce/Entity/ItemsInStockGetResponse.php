<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\ResponseInterface;

class ItemsInStockGetResponse implements ResponseInterface
{
    /**
     * @property ArrayOfInventoryResponse $ItemsInStockGetResult
     */
    protected $ItemsInStockGetResult = null;

    /**
     * @param ArrayOfInventoryResponse $ItemsInStockGetResult
     * @return $this
     */
    public function setItemsInStockGetResult($ItemsInStockGetResult)
    {
        $this->ItemsInStockGetResult = $ItemsInStockGetResult;
        return $this;
    }

    /**
     * @return ArrayOfInventoryResponse
     */
    public function getItemsInStockGetResult()
    {
        return $this->ItemsInStockGetResult;
    }

    /**
     * @return ArrayOfInventoryResponse
     */
    public function getResult()
    {
        return $this->ItemsInStockGetResult;
    }
}

