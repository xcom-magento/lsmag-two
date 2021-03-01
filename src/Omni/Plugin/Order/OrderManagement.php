<?php

namespace Ls\Omni\Plugin\Order;

use \Ls\Core\Model\LSR;
use \Ls\Omni\Helper\OrderHelper;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Sales\Api\OrderManagementInterface;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\OrderRepository;

/**
 * Class for cancelling the order
 */
class OrderManagement
{

    /**
     * @var LSR
     */
    private $lsr;
    /**
     * @var OrderHelper
     */
    private $orderHelper;

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * OrderManagement constructor.
     * @param LSR $lsr
     * @param OrderHelper $orderHelper
     * @param OrderRepository $orderRepository
     */
    public function __construct(
        LSR $lsr,
        OrderHelper $orderHelper,
        OrderRepository $orderRepository
    ) {
        $this->lsr = $lsr;
        $this->orderHelper = $orderHelper;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Around plugin to cancel the order
     *
     * @param OrderManagementInterface $subject
     * @param $proceed
     * @param $id
     * @return mixed
     * @throws AlreadyExistsException
     * @throws InputException
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function aroundCancel(OrderManagementInterface $subject, $proceed, $id)
    {
        /** @var Order $order */
        $order = $this->orderRepository->get($id);
        $documentId = $order->getDocumentId();
        $websiteId = $order->getStore()->getWebsiteId();
        /**
         * Adding condition to only process if LSR is enabled.
         */
        if ($this->lsr->isLSR($websiteId, 'website')) {
            if (!empty($documentId)) {
                $websiteId = $order->getStore()->getWebsiteId();
                $webStore = $this->lsr->getWebsiteConfig(LSR::SC_SERVICE_STORE, $websiteId);
                $response = $this->orderHelper->orderCancel($documentId, $webStore);
                if ($response == null) {
                    $message = 'Order cannot be canceled from LS Central';
                    $order->addCommentToStatusHistory($message);
                    $this->orderRepository->save($order);
                    throw new LocalizedException(__($message));
                }
            }
        }

        return $proceed($id);
    }
}
