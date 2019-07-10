<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP;

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

    /**
     * Se encarga de eliminar loa path para poder convirtir el string en un objeto DOM
     * @param $bodyXML
     * @return mixed
     */
    private function purificateXML()
    {
        $bodyXML = str_replace('xmlns="KaseyaWS"', '', $this->bodyResponse);
        $bodyXML = str_replace('xmlns="vsaServiceDeskWS"', '', $bodyXML);
        $bodyXML = str_replace('xmlns="http://www.kaseya.com/vsa/2007/12/ServiceDeskDefinition.xsd"', '', $bodyXML);
        return $bodyXML;
    }

    public function getBody($string = true)
    {
        if($string){
            return $this->bodyResponse;
        }

        $domResponse = new \DOMDocument();
        $domResponse->loadXML($this->purificateXML());
        return $domResponse;
    }



}