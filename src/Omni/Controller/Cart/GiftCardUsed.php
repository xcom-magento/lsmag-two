<?php

namespace Ls\Omni\Controller\Cart;

use Exception;
use \Ls\Omni\Helper\BasketHelper;
use \Ls\Omni\Helper\Data;
use \Ls\Omni\Helper\GiftCardHelper;
use Magento\Checkout\Model\Cart;
use Magento\Checkout\Model\Session\Proxy;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Gift card controller
 */
class GiftCardUsed extends \Magento\Checkout\Controller\Cart
{
    /**
     * Sales quote repository
     *
     * @var CartRepositoryInterface
     */
    public $quoteRepository;

    /**
     * @var GiftCardHelper
     */
    public $giftCardHelper;

    /**
     * @var BasketHelper
     */
    public $basketHelper;

    /**
     * @var \Magento\Framework\Pricing\Helper\Data
     */
    public $priceHelper;

    /**
     * @var Data
     */
    public $data;

    /**
     * GiftCardUsed constructor.
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param Proxy $checkoutSession
     * @param StoreManagerInterface $storeManager
     * @param Validator $formKeyValidator
     * @param Cart $cart
     * @param CartRepositoryInterface $quoteRepository
     * @param GiftCardHelper $giftCardHelper
     * @param BasketHelper $basketHelper
     * @param \Magento\Framework\Pricing\Helper\Data $priceHelper
     * @param Data $data
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        Proxy $checkoutSession,
        StoreManagerInterface $storeManager,
        Validator $formKeyValidator,
        Cart $cart,
        CartRepositoryInterface $quoteRepository,
        GiftCardHelper $giftCardHelper,
        BasketHelper $basketHelper,
        \Magento\Framework\Pricing\Helper\Data $priceHelper,
        Data $data
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
        $this->giftCardHelper  = $giftCardHelper;
        $this->priceHelper     = $priceHelper;
        $this->basketHelper    = $basketHelper;
        $this->data            = $data;
    }

    /**
     * Add and remove gift card from cart page
     * @return Redirect
     */
    public function execute()
    {
        $giftCardNo            = $this->getRequest()->getParam('giftcardno');
        $giftCardBalanceAmount = 0;
        $giftCardAmount        = $this->getRequest()->getParam('removegiftcard') == 1
            ? 0
            : trim($this->getRequest()->getParam('giftcardamount'));

        $giftCardAmount = (float)$giftCardAmount;
        try {
            if (!is_numeric($giftCardAmount) || $giftCardAmount < 0) {
                $this->messageManager->addErrorMessage(
                    __(
                        'The gift card Amount "%1" is not valid.',
                        $this->priceHelper->currency($giftCardAmount, true, false)
                    )
                );
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

            $cartQuote    = $this->cart->getQuote();
            $itemsCount   = $cartQuote->getItemsCount();
            $orderBalance = $this->data->getOrderBalance(
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
                        'The applied amount %3' .
                        ' is greater than gift card balance amount (%1) or it is greater than order balance (%2).',
                        $this->priceHelper->currency(
                            $giftCardBalanceAmount,
                            true,
                            false
                        ),
                        $this->priceHelper->currency(
                            $orderBalance,
                            true,
                            false
                        ),
                        $this->priceHelper->currency(
                            $giftCardAmount,
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
                            "Gift Card cannot be applied."
                        )
                    );
                }
            } else {
                if ($giftCardAmount == 0) {
                    $this->_checkoutSession->getQuote()->setLsGiftCardNo(null)->save();
                }
                $this->messageManager->addSuccessMessage(__('You have successfully cancelled the gift card.'));
            }
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage(__('Gift Card cannot be applied.'));
        }

        return $this->_goBack();
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getBaseCurrencyCode()
    {
        return $this->_checkoutSession->getQuote()->getBaseCurrencyCode();
    }
}
