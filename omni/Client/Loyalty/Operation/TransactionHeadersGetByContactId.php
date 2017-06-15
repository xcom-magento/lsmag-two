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
use Ls\Omni\Client\Loyalty\Entity\TransactionHeadersGetByContactId as TransactionHeadersGetByContactIdRequest;
use Ls\Omni\Client\Loyalty\Entity\TransactionHeadersGetByContactIdResponse as TransactionHeadersGetByContactIdResponse;

class TransactionHeadersGetByContactId extends AbstractOperation
{

    const OPERATION_NAME = 'TRANSACTION_HEADERS_GET_BY_CONTACT_ID';

    const SERVICE_TYPE = 'loyalty';

    /**
     * @property OmniClient $client
     */
    public $client = null;

    /**
     * @property TransactionHeadersGetByContactIdRequest $request
     */
    private $request = null;

    /**
     * @property TransactionHeadersGetByContactIdResponse $response
     */
    private $response = null;

    /**
     * @property TransactionHeadersGetByContactIdRequest $request_xml
     */
    private $request_xml = null;

    /**
     * @property TransactionHeadersGetByContactIdResponse $response_xml
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
     * @param TransactionHeadersGetByContactIdRequest $request
     * @return IResponse|TransactionHeadersGetByContactIdResponse
     */
    public function execute(IRequest $request = null)
    {
        if ( !is_null( $request ) ) {
            $this->setRequest( $request );
        }
        return $this->makeRequest( 'TransactionHeadersGetByContactId' );
    }

    /**
     * @return TransactionHeadersGetByContactIdRequest
     */
    public function & getOperationInput()
    {
        if ( is_null( $this->request ) ) {
            $this->request = new TransactionHeadersGetByContactIdRequest();
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
     * @param TransactionHeadersGetByContactIdRequest $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return TransactionHeadersGetByContactIdRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param TransactionHeadersGetByContactIdResponse $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return TransactionHeadersGetByContactIdResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param TransactionHeadersGetByContactIdRequest $request_xml
     * @return $this
     */
    public function setRequestXml($request_xml)
    {
        $this->request_xml = $request_xml;
        return $this;
    }

    /**
     * @return TransactionHeadersGetByContactIdRequest
     */
    public function getRequestXml()
    {
        return $this->request_xml;
    }

    /**
     * @param TransactionHeadersGetByContactIdResponse $response_xml
     * @return $this
     */
    public function setResponseXml($response_xml)
    {
        $this->response_xml = $response_xml;
        return $this;
    }

    /**
     * @return TransactionHeadersGetByContactIdResponse
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
