<?php

namespace Ls\Replication\Cron;

use Exception;
use \Ls\Core\Model\LSR;
use \Ls\Replication\Model\ReplPrice;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Cron responsible to update prices for item and variants
 */
class SyncPrice extends ProductCreateTask
{
    /** @var bool */
    public $cronStatus = false;

    /** @var int */
    public $remainingRecords;

    /**
     * Entry point for cron
     *
     * @param mixed $storeData
     * @return void
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
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
                        LSR::SC_PRODUCT_PRICE_CONFIG_PATH_LAST_EXECUTE,
                        $this->store->getId(),
                        ScopeInterface::SCOPE_STORES
                    );
                    $this->logger->debug('Running SyncPrice Task for store ' . $this->store->getName());

                    $productPricesBatchSize = $this->replicationHelper->getProductPricesBatchSize();

                    /** Get list of only those prices whose items are already processed */
                    $filters = [
                        ['field' => 'main_table.scope_id', 'value' => $this->getScopeId(), 'condition_type' => 'eq']
                    ];

                    $criteria   = $this->replicationHelper->buildCriteriaForArrayWithAlias(
                        $filters,
                        $productPricesBatchSize,
                        1
                    );
                    $collection = $this->replPriceCollectionFactory->create();
                    $this->replicationHelper->setCollectionPropertiesPlusJoinSku(
                        $collection,
                        $criteria,
                        'ItemId',
                        'VariantId',
                        ['repl_price_id']
                    );
                    /** @var ReplPrice $replPrice */
                    foreach ($collection as $replPrice) {
                        try {
                            $baseUnitOfMeasure = $itemPriceCount = null;

                            if ($replPrice->getVariantId() && $replPrice->getUnitOfMeasure()) {
                                $uom = $replPrice->getUnitOfMeasure();
                                $sku = $replPrice->getItemId() . '-' . $replPrice->getVariantId() . '-' . $uom;
                            } elseif ((!$replPrice->getVariantId() && !$replPrice->getUnitOfMeasure()) ||
                                (!$replPrice->getVariantId() && $replPrice->getUnitOfMeasure())
                            ) {
                                $sku = $replPrice->getItemId();
                                $uom = '';
                            } else {
                                $uom = $this->replicationHelper->getBaseUnitOfMeasure($replPrice->getItemId());
                                $sku = $replPrice->getItemId() . '-' . $replPrice->getVariantId() . '-' . $uom;
                            }
                            $productData = $this->replicationHelper->getProductDataByIdentificationAttributes(
                                $replPrice->getItemId(),
                                $replPrice->getVariantId(),
                                $uom,
                                $this->store->getId()
                            );
                            if (isset($productData)) {
                                if (empty($replPrice->getUnitOfMeasure())) {
                                    $baseUnitOfMeasure = $productData->getData('uom');
                                    $itemPriceCount    = $this->getItemPriceCount($replPrice->getItemId());
                                    $productData->setPrice($replPrice->getUnitPriceInclVat());
                                    // @codingStandardsIgnoreStart
                                    $this->productResourceModel->saveAttribute($productData, 'price');
                                }
                                // @codingStandardsIgnoreEnd
                                if ($productData->getTypeId() == 'configurable') {
                                    $children = $productData->getTypeInstance()->getUsedProducts($productData);
                                    foreach ($children as $child) {
                                        $childProductData = $this->productRepository->get($child->getSKU());
                                        if ($this->validateChildPriceUpdate(
                                            $childProductData,
                                            $replPrice,
                                            $baseUnitOfMeasure,
                                            $itemPriceCount
                                        )) {
                                            $childProductData->setPrice($replPrice->getUnitPriceInclVat());
                                            // @codingStandardsIgnoreStart
                                            $this->productResourceModel->saveAttribute($childProductData, 'price');
                                            // @codingStandardsIgnoreEnd
                                        }
                                    }
                                }
                            }
                        } catch (Exception $e) {
                            $this->logger->debug(
                                sprintf(
                                    'Exception happened in %s for store: %s, item id: %s',
                                    __METHOD__,
                                    $this->store->getName(),
                                    $sku
                                )
                            );
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
                    $this->replicationHelper->updateCronStatus(
                        $this->cronStatus,
                        LSR::SC_SUCCESS_CRON_PRODUCT_PRICE,
                        $this->store->getId(),
                        false,
                        ScopeInterface::SCOPE_STORES
                    );
                    $this->logger->debug('End SyncPrice Task for store ' . $this->store->getName());
                }
                $this->lsr->setStoreId(null);
            }
        }
    }

    /**
     * Execute manually
     *
     * @param mixed $storeData
     * @return int[]
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function executeManually($storeData = null)
    {
        $this->execute($storeData);
        $itemsLeftToProcess = (int)$this->getRemainingRecords($storeData);
        return [$itemsLeftToProcess];
    }

    /**
     * Validate child product price update
     *
     * @param mixed $productData
     * @param mixed $replPrice
     * @param string $baseUnitOfMeasure
     * @param string $itemPriceCount
     * @return bool
     */
    private function validateChildPriceUpdate(
        $productData,
        $replPrice,
        $baseUnitOfMeasure = null,
        $itemPriceCount = null
    ) {
        $needsPriceUpdate = false;
        if ($productData->getData('uom') == $baseUnitOfMeasure) {
            $needsPriceUpdate = true;
        } elseif ($productData->getData('uom') == $replPrice->getUnitOfMeasure()) {
            $needsPriceUpdate = true;
        } elseif (empty($productData->getData(LSR::LS_UOM_ATTRIBUTE_QTY))
            && ($replPrice->getQtyPerUnitOfMeasure() == 0)) {
            $needsPriceUpdate = true;
        } elseif ($itemPriceCount == 1 && $baseUnitOfMeasure != null) {
            $needsPriceUpdate = true;
        }
        return $needsPriceUpdate;
    }

    /**
     * Getting total entries of price in price table
     *
     * @param string $itemId
     * @return int
     */
    public function getItemPriceCount($itemId)
    {
        $itemsCount     = 0;
        $webStoreId     = $this->lsr->getStoreConfig(
            LSR::SC_SERVICE_STORE,
            $this->store->getId()
        );
        $filters        = [
            ['field' => 'ItemId', 'value' => $itemId, 'condition_type' => 'eq'],
            ['field' => 'StoreId', 'value' => $webStoreId, 'condition_type' => 'eq'],
            ['field' => 'scope_id', 'value' => $this->getScopeId(), 'condition_type' => 'eq'],
        ];
        $searchCriteria = $this->replicationHelper->buildCriteriaForDirect($filters, -1);
        try {
            $itemsCount = $this->replPriceRepository->getList($searchCriteria)->getTotalCount();
        } catch (Exception $e) {
            $this->logger->debug(
                sprintf(
                    'Exception happened in %s for store: %s, item id: %s',
                    __METHOD__,
                    $this->store->getName(),
                    $itemId
                )
            );
            $this->logger->debug($e->getMessage());
        }
        return $itemsCount;
    }

    /**
     * Get remaining records
     *
     * @param mixed $storeData
     * @return int
     * @throws LocalizedException
     */
    public function getRemainingRecords($storeData = null)
    {
        if (!$this->remainingRecords) {
            /** Get list of only those prices whose items are already processed */
            $filters = [
                ['field' => 'main_table.scope_id', 'value' => $this->getScopeId(), 'condition_type' => 'eq'],
                ['field' => 'main_table.QtyPerUnitOfMeasure', 'value' => 0, 'condition_type' => 'eq']
            ];

            $criteria   = $this->replicationHelper->buildCriteriaForArrayWithAlias(
                $filters
            );
            $collection = $this->replPriceCollectionFactory->create();
            $this->replicationHelper->setCollectionPropertiesPlusJoinSku(
                $collection,
                $criteria,
                'ItemId',
                'VariantId',
                ['repl_price_id']
            );
            $this->remainingRecords = $collection->getSize();
        }
        return $this->remainingRecords;
    }
}
