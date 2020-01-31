<?php
namespace test_api\Service;

use Zend\Http\Request;
use Zend\Http\Client;
use Zend\Stdlib\Parameters;

class ApiRequestService
{
    private $objRequest;
    private $arrParameters;
    private $arrUrl;
    private $strMethod = 'GET';
    private $strUri;
    private $objClient;

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';

    const URI_API = 'http://test-api.local/';
    const URI_API_SOURCE = 'http://test-api-source.local/';


    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->objRequest = new Request();
        $this->objClient = new Client();
    }

    /**
     * Efetue request to API
     * @return array data returned api
     */
    public function request()
    {
        $this->objRequest->setUri($this->getUri());
        $this->objRequest->setMethod($this->getMethod());
        $arrHeader = array();
        if ($this->getMethod() === self::METHOD_POST) {
            $arrHeader['Content-Type'] = 'application/json';
            $this->objRequest->setPost(new Parameters($this->getParameters()));
            $this->objClient->setRawBody(json_encode($this->getParameters()));
        } else {
            $arrHeader['Accept'] = '*/*';
            $this->objRequest->setQuery(new Parameters($this->getParameters()));
        }
        $this->objRequest->getHeaders()->addHeaders($arrHeader);
        $response = $this->objClient->dispatch($this->objRequest);
        return json_decode($response->getBody(), true);
    }

    public function setUri($strUri)
    {
        $this->strUri = $strUri;
    }

    public function getUri()
    {
        return $this->strUri;
    }

    public function setMethod($strMethod)
    {
        $this->strMethod = $strMethod;
    }

    public function getMethod()
    {
        return $this->strMethod;
    }

    public function setParameters(array $arrParameters)
    {
        $this->arrParameters = $arrParameters;
    }

    public function getParameters()
    {
        return $this->arrParameters;
    }
}