<?php


namespace FuriosoJack\KaseyaSDKSOAP\Request;

/**
 * Class Response
 * @package FuriosoJack\KaseyaSDKSOAP\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Response
{


    private $bodyResponse;

    private $statusCode;

    public function __construct($curlClient, $bodyResponseRaw)
    {
        $this->extractData($curlClient);
        $this->bodyResponse = $bodyResponseRaw;
    }

    public function extractData($curlClient)
    {
        $this->statusCode = curl_getinfo($curlClient,CURLINFO_HTTP_CODE);
        curl_close($curlClient);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getBody()
    {
        return $this->bodyResponse;
    }



}