<?php

namespace Ls\Omni\Controller\Cart;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GiftCardUsed extends \Magento\Checkout\Controller\Cart
{
    /**
     * Sales quote repository
     *
     * @var \Magento\Quote\Api\CartRepositoryInterface
     */
    public $quoteRepository;

    /**
     * @var \Ls\Omni\Helper\GiftCardHelper
     */
    public $giftCardHelper;

    /**
     * @var \Ls\Omni\Helper\BasketHelper
     */
    public $basketHelper;

    /**
     * @var Price Helper
     */
    public $priceHelper;

    /**
     * @var Ls\Omni\Helper\Data
     */
    public $data;

    /**
     * GiftCardUsed constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Checkout\Model\Session\Proxy $checkoutSession
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator
     * @param \Magento\Checkout\Model\Cart $cart
     * @param \Magento\Quote\Api\CartRepositoryInterface $quoteRepository
     * @param \Ls\Omni\Helper\GiftCardHelper $giftCardHelper
     * @param \Ls\Omni\Helper\BasketHelper $basketHelper
     * @param \Magento\Framework\Pricing\Helper\Data $priceHelper
     * @param \Ls\Omni\Helper\Data $data
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Checkout\Model\Session\Proxy $checkoutSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator,
        \Magento\Checkout\Model\Cart $cart,
        \Magento\Quote\Api\CartRepositoryInterface $quoteRepository,
        \Ls\Omni\Helper\GiftCardHelper $giftCardHelper,
        \Ls\Omni\Helper\BasketHelper $basketHelper,
        \Magento\Framework\Pricing\Helper\Data $priceHelper,
        \Ls\Omni\Helper\Data $data
    ) {
        parent::__construct(
            $context,
            $scopeConfig,
            $checkoutSession,
            $storeManager,
            $formKeyValidator,
            $cart
        );
        $this->quoteRepository = $quoteRepository;
        $this->giftCardHelper = $giftCardHelper;
        $this->priceHelper = $priceHelper;
        $this->basketHelper = $basketHelper;
        $this->data = $data;
    }

    /**
     * Initialize coupon
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $giftCardNo = $this->getRequest()->getParam('giftcardno');
        $giftCardBalanceAmount = 0;
        $giftCardAmount = $this->getRequest()->getParam('removegiftcard') == 1
            ? 0
            : trim($this->getRequest()->getParam('giftcardamount'));

        $giftCardAmount = (float)$giftCardAmount;
        try {
            if (!is_numeric($giftCardAmount) || $giftCardAmount < 0) {
                $this->messageManager->addErrorMessage(__('The gift card Amount "%1" is not valid.', $this->priceHelper->currency($giftCardAmount, true, false)));
                return $this->_goBack();
            }
            if ($giftCardNo != null) {
                $giftCardResponse = $this->giftCardHelper->getGiftCardBalance($giftCardNo);

                if (is_object($giftCardResponse)) {
                    $giftCardBalanceAmount = $giftCardResponse->getBalance();
                } else {
                    $giftCardBalanceAmount = $giftCardResponse;
                }
            }

            if (empty($giftCardResponse)) {
                $this->messageManager->addErrorMessage(__('The gift card code %1 is not valid.', $giftCardNo));
                return $this->_goBack();
            }

            $cartQuote = $this->cart->getQuote();
            $itemsCount = $cartQuote->getItemsCount();
            $orderBalance =$this->data->getOrderBalance(
                0,
                $cartQuote->getLsPointsSpent(),
                $this->basketHelper->getBasketSessionValue()
            );

            $isGiftCardAmountValid = $this->giftCardHelper->isGiftCardAmountValid(
                $orderBalance,
                $giftCardAmount,
                $giftCardBalanceAmount
            );

            if ($isGiftCardAmountValid == false) {
                $this->messageManager->addErrorMessage(
                    __(
                        'The applied amount ' . $this->priceHelper->currency(
                            $giftCardAmount,
                            true,
                            false
                        ).
                        ' is greater than gift card balance amount (%1)
                        or it is greater than order balance (Excl. Shipping Amount) (%2).',
                        $this->priceHelper->currency(
                            $giftCardBalanceAmount,
                            true,
                            false
                        ),
                        $this->priceHelper->currency(
                            $orderBalance,
                            true,
                            false
                        )
                    )
                );
                return $this->_goBack();
            }
            if ($itemsCount && !empty($giftCardResponse) && $isGiftCardAmountValid) {
                $cartQuote->getShippingAddress()->setCollectShippingRates(true);
                $cartQuote->setLsGiftCardAmountUsed($giftCardAmount)->collectTotals();
                $cartQuote->setLsGiftCardNo($giftCardNo)->collectTotals();
                $cartQuote->setCouponCode($this->_checkoutSession->getCouponCode())->collectTotals();
                $this->quoteRepository->save($cartQuote);
            }
            if ($giftCardAmount) {
                if ($itemsCount) {
                    if (!empty($giftCardResponse) && $isGiftCardAmountValid) {
                        $this->_checkoutSession->getQuote()->setLsGiftCardAmountUsed($giftCardAmount)->save();
                        $this->_checkoutSession->getQuote()->setLsGiftCardNo($giftCardNo)->save();
                        $this->messageManager->addSuccessMessage(
                            __(
                                'You have used "%1" amount from gift card.',
                                $this->priceHelper->currency($giftCardAmount, true, false)
                            )
                        );
                    } else {
                        $this->messageManager->addErrorMessage(
                            __(
                                'The gift card amount "%1" is not valid.',
                                $this->getBaseCurrencyCode() . $giftCardAmount
                            )
                        );
                    }
                } else {
                    $this->messageManager->addErrorMessage(
                        __(
                            "Gift Card cannot be apply."
                        )
                    );
                }
            } else {
                if($giftCardAmount==0){
                    $this->_checkoutSession->getQuote()->setLsGiftCardNo(null)->save();
                }
                $this->messageManager->addSuccessMessage(__('You have successfully cancelled the gift card.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Gift Card cannot be apply.'));
        }

        return $this->_goBack();
    }

    /**
     * @return string
     */
    public function getBaseCurrencyCode()
    {
        return $this->_checkoutSession->getQuote()->getBaseCurrencyCode();
    }

}
