<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 */


namespace Ls\Omni\Client\Ecommerce\Operation;

use Ls\Omni\Client\IRequest;
use Ls\Omni\Client\IResponse;
use Ls\Omni\Client\AbstractOperation;
use Ls\Omni\Service\Service as OmniService;
use Ls\Omni\Service\ServiceType;
use Ls\Omni\Service\Soap\Client as OmniClient;
use Ls\Omni\Client\Ecommerce\ClassMap;
use Ls\Omni\Client\Ecommerce\Entity\ReplEcommItemUnitOfMeasures as ReplEcommItemUnitOfMeasuresRequest;
use Ls\Omni\Client\Ecommerce\Entity\ReplEcommItemUnitOfMeasuresResponse as ReplEcommItemUnitOfMeasuresResponse;

class ReplEcommItemUnitOfMeasures extends AbstractOperation
{

    const OPERATION_NAME = 'REPL_ECOMM_ITEM_UNIT_OF_MEASURES';

    const SERVICE_TYPE = 'ecommerce';

    /**
     * @property OmniClient $client
     */
    public $client = null;

    /**
     * @property ReplEcommItemUnitOfMeasuresRequest $request
     */
    private $request = null;

    /**
     * @property ReplEcommItemUnitOfMeasuresResponse $response
     */
    private $response = null;

    /**
     * @property ReplEcommItemUnitOfMeasuresRequest $request_xml
     */
    private $request_xml = null;

    /**
     * @property ReplEcommItemUnitOfMeasuresResponse $response_xml
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
     * @param ReplEcommItemUnitOfMeasuresRequest $request
     * @return IResponse|ReplEcommItemUnitOfMeasuresResponse
     */
    public function execute(IRequest $request = null)
    {
        if ( !is_null( $request ) ) {
            $this->setRequest( $request );
        }
        return $this->makeRequest( 'ReplEcommItemUnitOfMeasures' );
    }

    /**
     * @return ReplEcommItemUnitOfMeasuresRequest
     */
    public function & getOperationInput()
    {
        if ( is_null( $this->request ) ) {
            $this->request = new ReplEcommItemUnitOfMeasuresRequest();
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

    protected function isTokenized()
    {
        return FALSE;
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
     * @param ReplEcommItemUnitOfMeasuresRequest $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return ReplEcommItemUnitOfMeasuresRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param ReplEcommItemUnitOfMeasuresResponse $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return ReplEcommItemUnitOfMeasuresResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param ReplEcommItemUnitOfMeasuresRequest $request_xml
     * @return $this
     */
    public function setRequestXml($request_xml)
    {
        $this->request_xml = $request_xml;
        return $this;
    }

    /**
     * @return ReplEcommItemUnitOfMeasuresRequest
     */
    public function getRequestXml()
    {
        return $this->request_xml;
    }

    /**
     * @param ReplEcommItemUnitOfMeasuresResponse $response_xml
     * @return $this
     */
    public function setResponseXml($response_xml)
    {
        $this->response_xml = $response_xml;
        return $this;
    }

    /**
     * @return ReplEcommItemUnitOfMeasuresResponse
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
