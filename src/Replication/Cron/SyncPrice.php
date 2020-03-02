<?php

namespace Ls\Replication\Cron;

use Exception;
use \Ls\Core\Model\LSR;
use \Ls\Replication\Model\ReplPrice;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\StateException;
use Magento\Store\Api\Data\StoreInterface;

/**
 * Class SyncPrice
 * @package Ls\Replication\Cron
 */
class SyncPrice extends ProductCreateTask
{
    /** @var bool */
    public $cronStatus = false;

    /** @var int */
    public $remainingRecords;

    public function execute($storeData = null)
    {
        if (!empty($storeData) && $storeData instanceof StoreInterface) {
            $stores = [$storeData];
        } else {
            /** @var StoreInterface[] $stores */
            $stores = $this->lsr->getAllStores();
        }
        if (!empty($stores)) {
            foreach ($stores as $store) {
                $this->lsr->setStoreId($store->getId());
                $this->store = $store;
                if ($this->lsr->isLSR($this->store->getId())) {
                    $this->replicationHelper->updateConfigValue(
                        $this->replicationHelper->getDateTime(),
                        LSR::SC_PRODUCT_PRICE_CONFIG_PATH_LAST_EXECUTE, $this->store->getId()
                    );
                    $this->logger->debug('Running SyncPrice Task for store ' . $this->store->getName());
                    $storeId = $this->lsr->getStoreConfig(LSR::SC_SERVICE_STORE, $this->store->getId());

                    $productPricesBatchSize = $this->replicationHelper->getProductPricesBatchSize();

                    /** Get list of only those prices whose items are already processed */
                    $filters = [
                        ['field' => 'main_table.StoreId', 'value' => $storeId, 'condition_type' => 'eq'],
                        ['field' => 'main_table.QtyPerUnitOfMeasure', 'value' => 0, 'condition_type' => 'eq']
                    ];

                    $criteria   = $this->replicationHelper->buildCriteriaForArrayWithAlias(
                        $filters,
                        $productPricesBatchSize,
                        1
                    );
                    $collection = $this->replPriceCollectionFactory->create();
                    $this->replicationHelper->setCollectionPropertiesPlusJoin(
                        $collection,
                        $criteria,
                        'ItemId',
                        'catalog_product_entity',
                        'sku',
                        true
                    );
                    if ($collection->getSize() > 0) {
                        /** @var ReplPrice $replPrice */
                        foreach ($collection as $replPrice) {
                            try {
                                if (!$replPrice->getVariantId()) {
                                    $sku = $replPrice->getItemId();
                                } else {
                                    $sku = $replPrice->getItemId() . '-' . $replPrice->getVariantId();
                                }
                                $productData = $this->productRepository->get($sku, true, $this->store->getId());
                                if (isset($productData)) {
                                    $productData->setPrice($replPrice->getUnitPrice());
                                    // @codingStandardsIgnoreStart
                                    $this->productResourceModel->saveAttribute($productData, 'price');
                                    // @codingStandardsIgnoreEnd
                                    if ($productData->getTypeId() == 'configurable') {
                                        $_children = $productData->getTypeInstance()->getUsedProducts($productData);
                                        foreach ($_children as $child) {
                                            $childProductData = $this->productRepository->get($child->getSKU());
                                            $childProductData->setPrice($replPrice->getUnitPrice());
                                            // @codingStandardsIgnoreStart
                                            $this->productResourceModel->saveAttribute($childProductData, 'price');
                                            // @codingStandardsIgnoreEnd
                                        }
                                    }
                                }
                            } catch (Exception $e) {
                                $this->logger->debug('Problem with sku: ' . $sku . ' in ' . __METHOD__);
                                $this->logger->debug($e->getMessage());
                                $replPrice->setData('is_failed', 1);
                            }
                            $replPrice->setData('is_updated', 0);
                            $replPrice->setData('processed', 1);
                            $replPrice->setData('processed_at', $this->replicationHelper->getDateTime());
                            $this->replPriceRepository->save($replPrice);
                        }
                        $remainingItems = (int)$this->getRemainingRecords($this->store);
                        if ($remainingItems == 0) {
                            $this->cronStatus = true;
                        }
                    } else {
                        $this->cronStatus = true;
                    }
                    $this->replicationHelper->updateCronStatus($this->cronStatus, LSR::SC_SUCCESS_CRON_PRODUCT_PRICE,
                        $this->store->getId());
                    $this->logger->debug('End SyncPrice Task for store ' . $this->store->getName());
                }
                $this->lsr->setStoreId(null);
            }
        }
    }

    /**
     * @param null $storeData
     * @return array
     * @throws CouldNotSaveException
     * @throws InputException
     * @throws LocalizedException
     * @throws StateException
     */
    public function executeManually($storeData = null)
    {
        $this->execute($storeData);
        $itemsLeftToProcess = (int)$this->getRemainingRecords($storeData);
        return [$itemsLeftToProcess];
    }

    /**
     * @param null $storeData
     * @return int
     */
    public function getRemainingRecords($storeData = null)
    {
        if (!$this->remainingRecords) {
            $storeId = $this->lsr->getStoreConfig(LSR::SC_SERVICE_STORE, $storeData->getId());
            /** Get list of only those prices whose items are already processed */
            $filters = [
                ['field' => 'main_table.StoreId', 'value' => $storeId, 'condition_type' => 'eq'],
                ['field' => 'main_table.QtyPerUnitOfMeasure', 'value' => 0, 'condition_type' => 'eq']
            ];

            $criteria   = $this->replicationHelper->buildCriteriaForArrayWithAlias(
                $filters
            );
            $collection = $this->replPriceCollectionFactory->create();
            $this->replicationHelper->setCollectionPropertiesPlusJoin(
                $collection,
                $criteria,
                'ItemId',
                'catalog_product_entity',
                'sku',
                true
            );
            $this->remainingRecords = $collection->getSize();
        }
        return $this->remainingRecords;
    }
}
