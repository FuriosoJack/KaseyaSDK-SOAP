<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP;

/**
 * Clase que representa la respuesta del servoidor
 * @package FuriosoJack\KaseyaSDKSOAP\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Response
{


    /**
     *  Contenido de la respuesta
     * @var String
     */
    private $bodyResponse;

    /**
     * codigo de estado de la peticion
     * @var
     */
    private $statusCode;

    /**
     * @var
     */
    private $classResponse;

    /**
     * Response constructor.
     * @param $curlClient
     * @param $bodyResponseRaw
     */
    public function __construct($curlClient, $bodyResponseRaw, $classResponse = null)
    {
        $this->extractData($curlClient);
        $this->bodyResponse = $bodyResponseRaw;
        $this->classResponse = $classResponse;

    }

    /**
     * @param $curlClient
     */
    public function extractData($curlClient)
    {
        $this->statusCode = curl_getinfo($curlClient,CURLINFO_HTTP_CODE);
        curl_close($curlClient);
    }

    /**
     * @return mixed
     */
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

    /**
     * Obtiene el contenido de la peticion
     * @param bool $string
     * @return \DOMDocument|String
     */
    public function getBody($string = true)
    {
        if($string){
            return $this->bodyResponse;
        }

        $domResponse = new \DOMDocument();
        $domResponse->loadXML($this->purificateXML());
        return $domResponse;
    }

    public function getResponseDOM()
    {
        $classResponseDOM = $this->classResponse;
        return new $classResponseDOM($this->getBody(false));
    }



}