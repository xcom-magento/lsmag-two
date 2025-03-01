<?php

namespace Ls\Core\Model;

use Exception;
use \Ls\Omni\Helper\CacheHelper;
use Magento\Config\Model\ResourceModel\Config\Data\CollectionFactory as ConfigCollectionFactory;
use Magento\Config\Model\ResourceModel\Config\Data\Collection as ConfigDataCollection;
use Magento\Framework\App\Area;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;
use SoapClient;

/**
 * Magento configuration related class
 */
class Data
{
    /** @var StoreManagerInterface */
    private $storeManager;

    /**
     * @var TransportBuilder
     */
    private $transportBuilder;
    /**
     * @var StateInterface
     */
    private $inlineTranslation;

    /**
     * @var WriterInterface
     */
    private $configWriter;

    /**
     * @var TypeListInterface
     */
    private $cacheTypeList;

    /**
     * @var CacheHelper
     */
    private $cacheHelper;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /** @var ConfigCollectionFactory */
    public $configDataCollectionFactory;

    /**
     * @var ScopeConfigInterface
     */
    public $scopeConfig;

    /**
     * @param StoreManagerInterface $storeManager
     * @param TransportBuilder $transportBuilder
     * @param StateInterface $state
     * @param WriterInterface $configWriter
     * @param ConfigCollectionFactory $configDataCollectionFactory
     * @param TypeListInterface $cacheTypeList
     * @param CacheHelper $cacheHelper
     * @param ScopeConfigInterface $scopeConfig
     * @param LoggerInterface $logger
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        TransportBuilder $transportBuilder,
        StateInterface $state,
        WriterInterface $configWriter,
        ConfigCollectionFactory $configDataCollectionFactory,
        TypeListInterface $cacheTypeList,
        CacheHelper $cacheHelper,
        ScopeConfigInterface $scopeConfig,
        LoggerInterface $logger
    ) {
        $this->storeManager                = $storeManager;
        $this->transportBuilder            = $transportBuilder;
        $this->inlineTranslation           = $state;
        $this->configWriter                = $configWriter;
        $this->cacheTypeList               = $cacheTypeList;
        $this->cacheHelper                 = $cacheHelper;
        $this->scopeConfig                 = $scopeConfig;
        $this->configDataCollectionFactory = $configDataCollectionFactory;
        $this->logger                      = $logger;
    }

    /**
     * @return bool
     * @throws NoSuchEntityException
     */
    public function enabled()
    {
        $enabled = $this->scopeConfig->getValue(
            LSR::SC_SERVICE_ENABLE,
            ScopeInterface::SCOPE_STORES,
            $this->storeManager->getStore()->getId()
        );
        return $enabled === '1' || $enabled === 1;
    }

    /**
     * @return bool
     * @throws NoSuchEntityException
     */
    public function checkNotificationEmailEnabled()
    {
        $enabled = $this->scopeConfig->getValue(
            LSR::LS_DISASTER_RECOVERY_STATUS,
            ScopeInterface::SCOPE_STORES,
            $this->storeManager->getStore()->getId()
        );
        return $enabled === '1' || $enabled === 1;
    }


    /**
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getNotificationEmail()
    {
        return $this->scopeConfig->getValue(
            LSR::LS_DISASTER_RECOVERY_NOTIFICATION_EMAIL,
            ScopeInterface::SCOPE_STORES,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function isNotificationEmailSent()
    {
        return $this->getConfigValueFromDb(
            LSR::LS_DISASTER_RECOVERY_NOTIFICATION_EMAIL_STATUS,
            ScopeInterface::SCOPE_STORES,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @param $status
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function setNotificationEmailSent($status)
    {
        $this->configWriter->save(
            LSR::LS_DISASTER_RECOVERY_NOTIFICATION_EMAIL_STATUS,
            $status,
            ScopeInterface::SCOPE_STORES,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getStoreEmail()
    {
        return $this->scopeConfig->getValue(
            'trans_email/ident_general/email',
            ScopeInterface::SCOPE_STORES,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @param $url
     * @return bool
     * @throws NoSuchEntityException
     */
    public function isEndpointResponding($url)
    {
        $opts    = [
            'http' => [
                'timeout' => floatval($this->scopeConfig->getValue(
                    LSR::SC_SERVICE_TIMEOUT,
                    ScopeInterface::SCOPE_STORES,
                    $this->storeManager->getStore()->getId()
                ))
            ]
        ];
        $context = stream_context_create($opts);
        try {
            // @codingStandardsIgnoreStart
            $soapClient = new SoapClient(
                $url . '?singlewsdl',
                array_merge(['stream_context' => $context], $this->cacheHelper->getWsdlOptions())

            );
            // @codingStandardsIgnoreEnd
            if ($soapClient) {
                if ($this->isNotificationEmailSent()) {
                    $this->setNotificationEmailSent(0);
                }
                return true;
            }
        } catch (Exception $e) {
            $this->logger->critical($e->getMessage());
            if ($this->checkNotificationEmailEnabled() && !$this->isNotificationEmailSent()) {
                $this->sendEmail($e->getMessage());
            }
        }
        return false;
    }

    /**
     * @param $message
     * @throws NoSuchEntityException
     */
    public function sendEmail($message)
    {
        $templateId = LSR::EMAIL_TEMPLATE_ID_FOR_OMNI_SERVICE_DOWN;

        $toEmail    = $this->getNotificationEmail();
        $storeEmail = $this->getStoreEmail();
        try {
            // template variables pass here
            $templateVars = [
                'message' => $message
            ];

            $storeId = $this->storeManager->getStore()->getId();

            $this->inlineTranslation->suspend();

            $storeScope      = ScopeInterface::SCOPE_STORE;
            $templateOptions = [
                'area'  => Area::AREA_FRONTEND,
                'store' => $storeId
            ];
            $sender          = [
                'name'  => $this->storeManager->getStore()->getName(),
                'email' => $storeEmail,
            ];
            $transport       = $this->transportBuilder->setTemplateIdentifier($templateId, $storeScope)
                ->setTemplateOptions($templateOptions)
                ->setTemplateVars($templateVars)
                ->addTo($toEmail)
                ->setFromByScope($sender, $storeId)
                ->getTransport();
            $transport->sendMessage();
            $this->inlineTranslation->resume();
            $this->setNotificationEmailSent(1);
        } catch (\Exception $e) {
            $this->logger->info($e->getMessage());
        }
    }

    /**
     * Use this where we want to retrieve non-cached value from core_config_data
     * i-e like in processing crons.
     * @param $path
     * @param string $scope
     * @param int $scopeId
     * @return mixed|null
     */
    public function getConfigValueFromDb($path, $scope = 'default', $scopeId = 0)
    {
        /** @var ConfigDataCollection $configDataCollection */
        $configDataCollection = $this->configDataCollectionFactory->create();
        $configDataCollection->addFieldToFilter('scope', $scope);
        $configDataCollection->addFieldToFilter('scope_id', $scopeId);
        $configDataCollection->addFieldToFilter('path', $path);
        if ($configDataCollection->count() !== 0) {
            return $configDataCollection->getFirstItem()->getValue();
        }
        return null;
    }

}
