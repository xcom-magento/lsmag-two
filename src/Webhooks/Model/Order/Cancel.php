<?php

namespace Ls\Webhooks\Model\Order;

use \Ls\Webhooks\Logger\Logger;
use \Ls\Webhooks\Helper\Data;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Sales\Api\OrderManagementInterface;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\ItemRepository;

/**
 * class to cancel order through webhook
 */
class Cancel
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * @var OrderManagementInterface
     */
    private $orderManagement;

    /**
     * @var Data
     */
    private $helper;

    /**
     * @var ItemRepository
     */
    private $itemRepository;

    /**
     * Cancel constructor.
     * @param OrderManagementInterface $orderManagement
     * @param ItemRepository $itemRepository
     * @param Data $helper
     * @param Logger $logger
     */
    public function __construct(
        OrderManagementInterface $orderManagement,
        ItemRepository $itemRepository,
        Data $helper,
        Logger $logger
    ) {
        $this->orderManagement = $orderManagement;
        $this->itemRepository  = $itemRepository;
        $this->logger          = $logger;
        $this->helper          = $helper;
    }

    /**
     * cancel order
     * @param $orderId
     */
    public function cancelOrder($orderId)
    {
        try {
            $this->orderManagement->cancel($orderId);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }

    /**
     * For cancelling order item
     * @param $magOrder
     * @param $itemsInfo
     * @throws NoSuchEntityException
     */
    public function cancelItems($magOrder, $itemsInfo)
    {
        if ($magOrder->canCancel()) {
            $items = $this->helper->getItems($magOrder, $itemsInfo);
            foreach ($items as $item) {
                $item->cancel();
                $this->itemRepository->save($item);

                $magOrder->setSubtotalCanceled($magOrder->getSubtotalCanceled() + $item->getRowTotal());
                $magOrder->setBaseSubtotalCanceled($magOrder->getBaseSubtotalCanceled() + $item->getRowTotal());

                $magOrder->setTaxCanceled($magOrder->getTaxCanceled() + $item->getRowTotal());
                $magOrder->setBaseTaxCanceled($magOrder->getBaseTaxCanceled() + $item->getRowTotal());

                $magOrder->setDiscountCanceled($magOrder->getDiscountCanceled() + $item->getRowTotal());
                $magOrder->setBaseDiscountCanceled($magOrder->getBaseDiscountCanceled() + $item->getRowTotal());

                $magOrder->setTotalCanceled($magOrder->getTotalCanceled() + $item->getRowTotal());
                $magOrder->setBaseTotalCanceled($magOrder->getBaseTotalCanceled() + $item->getRowTotal());

                $this->helper->getOrderRepository()->save($magOrder);
            }
            if (!$magOrder->canCancel()) {
                $magOrder->setShippingCanceled($magOrder->getShippingAmount());
                $magOrder->setBaseShippingCanceled($magOrder->getShippingAmount());

                $magOrder->setLsPointsSpent(0);
                $magOrder->setLsGiftCardAmountUsed(0);

                $this->helper->updateOrderStatus($magOrder, Order::STATE_CANCELED, 'canceled');
                $magOrder->setTotalCanceled($magOrder->getGrandTotal() - $magOrder->getTotalPaid());
                $this->helper->getOrderRepository()->save($magOrder);
            }
        }
    }
}
