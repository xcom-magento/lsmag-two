<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 */


namespace Ls\Omni\Client\Loyalty\Operation;

use Ls\Omni\Client\IRequest;
use Ls\Omni\Client\IResponse;
use Ls\Omni\Client\AbstractOperation;
use Ls\Omni\Service\Service as OmniService;
use Ls\Omni\Service\ServiceType;
use Ls\Omni\Service\Soap\Client as OmniClient;
use Ls\Omni\Client\Loyalty\ClassMap;
use Ls\Omni\Client\Loyalty\Entity\OrderQueueUpdateStatus as OrderQueueUpdateStatusRequest;
use Ls\Omni\Client\Loyalty\Entity\OrderQueueUpdateStatusResponse as OrderQueueUpdateStatusResponse;

class OrderQueueUpdateStatus extends AbstractOperation
{

    const OPERATION_NAME = 'ORDER_QUEUE_UPDATE_STATUS';

    const SERVICE_TYPE = 'loyalty';

    /**
     * @property OmniClient $client
     */
    public $client = null;

    /**
     * @property OrderQueueUpdateStatusRequest $request
     */
    private $request = null;

    /**
     * @property OrderQueueUpdateStatusResponse $response
     */
    private $response = null;

    /**
     * @property OrderQueueUpdateStatusRequest $request_xml
     */
    private $request_xml = null;

    /**
     * @property OrderQueueUpdateStatusResponse $response_xml
     */
    private $response_xml = null;

    /**
     * @property mixed $error
     */
    private $error = null;

    /**
     * @param ServiceType $service_type
     */
    public function __construct()
    {
        $service_type = new ServiceType( self::SERVICE_TYPE );
        parent::__construct( $service_type );
        $url = OmniService::getUrl( $service_type ); 
        $this->client = new OmniClient( $url, $service_type );
        $this->client->setClassmap( $this->getClassMap() );
    }

    /**
     * @param OrderQueueUpdateStatusRequest $request
     * @return IResponse|OrderQueueUpdateStatusResponse
     */
    public function execute(IRequest $request = null)
    {
        if ( !is_null( $request ) ) {
            $this->setRequest( $request );
        }
        return $this->makeRequest( 'OrderQueueUpdateStatus' );
    }

    /**
     * @return OrderQueueUpdateStatusRequest
     */
    public function & getOperationInput()
    {
        if ( is_null( $this->request ) ) {
            $this->request = new OrderQueueUpdateStatusRequest();
        }
        return $this->request;
    }

    /**
     * @return array
     */
    public function getClassMap()
    {
        return ClassMap::getClassMap();
    }

    /**
     * @param OmniClient $client
     * @return $this
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return OmniClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param OrderQueueUpdateStatusRequest $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return OrderQueueUpdateStatusRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param OrderQueueUpdateStatusResponse $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return OrderQueueUpdateStatusResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param OrderQueueUpdateStatusRequest $request_xml
     * @return $this
     */
    public function setRequestXml($request_xml)
    {
        $this->request_xml = $request_xml;
        return $this;
    }

    /**
     * @return OrderQueueUpdateStatusRequest
     */
    public function getRequestXml()
    {
        return $this->request_xml;
    }

    /**
     * @param OrderQueueUpdateStatusResponse $response_xml
     * @return $this
     */
    public function setResponseXml($response_xml)
    {
        $this->response_xml = $response_xml;
        return $this;
    }

    /**
     * @return OrderQueueUpdateStatusResponse
     */
    public function getResponseXml()
    {
        return $this->response_xml;
    }

    /**
     * @param mixed $error
     * @return $this
     */
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }


}

