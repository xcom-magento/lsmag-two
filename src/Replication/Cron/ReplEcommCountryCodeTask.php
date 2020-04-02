<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Replication\Cron;

use Ls\Replication\Logger\Logger;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Config\Model\ResourceModel\Config;
use Ls\Core\Helper\Data as LsHelper;
use Ls\Replication\Helper\ReplicationHelper;
use Ls\Omni\Client\Ecommerce\Entity\ReplRequest;
use Ls\Omni\Client\Ecommerce\Operation\ReplEcommCountryCode;
use Ls\Replication\Api\ReplCountryCodeRepositoryInterface as ReplCountryCodeRepository;
use Ls\Replication\Model\ReplCountryCodeFactory;
use Ls\Replication\Api\Data\ReplCountryCodeInterface;

class ReplEcommCountryCodeTask extends AbstractReplicationTask
{

    const JOB_CODE = 'replication_repl_country_code';

    const CONFIG_PATH = 'ls_mag/replication/repl_country_code';

    const CONFIG_PATH_STATUS = 'ls_mag/replication/status_repl_country_code';

    const CONFIG_PATH_LAST_EXECUTE = 'ls_mag/replication/last_execute_repl_country_code';

    const CONFIG_PATH_MAX_KEY = 'ls_mag/replication/max_key_repl_country_code';

    /**
     * @property ReplCountryCodeRepository $repository
     */
    protected $repository = null;

    /**
     * @property ReplCountryCodeFactory $factory
     */
    protected $factory = null;

    /**
     * @property ReplCountryCodeInterface $data_interface
     */
    protected $data_interface = null;

    /**
     * @param ReplCountryCodeRepository $repository
     * @return $this
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
        return $this;
    }

    /**
     * @return ReplCountryCodeRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param ReplCountryCodeFactory $factory
     * @return $this
     */
    public function setFactory($factory)
    {
        $this->factory = $factory;
        return $this;
    }

    /**
     * @return ReplCountryCodeFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * @param ReplCountryCodeInterface $data_interface
     * @return $this
     */
    public function setDataInterface($data_interface)
    {
        $this->data_interface = $data_interface;
        return $this;
    }

    /**
     * @return ReplCountryCodeInterface
     */
    public function getDataInterface()
    {
        return $this->data_interface;
    }

    public function __construct(ScopeConfigInterface $scope_config, Config $resource_config, Logger $logger, LsHelper $helper, ReplicationHelper $repHelper, ReplCountryCodeFactory $factory, ReplCountryCodeRepository $repository, ReplCountryCodeInterface $data_interface)
    {
        parent::__construct($scope_config, $resource_config, $logger, $helper, $repHelper);
        $this->repository = $repository;
        $this->factory = $factory;
        $this->data_interface = $data_interface;
    }

    public function makeRequest($lastKey, $fullReplication = false, $batchSize = 100, $storeId = '', $maxKey = '', $baseUrl = '')
    {
        $request = new ReplEcommCountryCode($baseUrl);
        $request->getOperationInput()
                 ->setReplRequest( ( new ReplRequest() )->setBatchSize($batchSize)
                                                        ->setFullReplication($fullReplication)
                                                        ->setLastKey($lastKey)
                                                        ->setMaxKey($maxKey)
                                                        ->setStoreId($storeId));
        return $request;
    }

    public function getConfigPath()
    {
        return self::CONFIG_PATH;
    }

    public function getConfigPathStatus()
    {
        return self::CONFIG_PATH_STATUS;
    }

    public function getConfigPathLastExecute()
    {
        return self::CONFIG_PATH_LAST_EXECUTE;
    }

    public function getConfigPathMaxKey()
    {
        return self::CONFIG_PATH_MAX_KEY;
    }

    public function getMainEntity()
    {
        return $this->data_interface;
    }


}

