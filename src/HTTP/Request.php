<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\BodyRequestDOM;

/**
 * Clase que se encarga de hacer la peticion al servidor
 * @package FuriosoJack\KaseyaSDKSOAP\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Request
{

    /**
     * @var resource
     */
    private $clientCurl;

    /**
     * @var array
     */
    private $headers;

    /**
     * Request constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->headers = array(
            'Content-type: text/xml;charset="utf-8"',
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache");

        $this->clientCurl = curl_init();

        $this->setConfigClient($url);

    }

    /**
     * @param $url
     */
    private function setConfigClient($url)
    {
        curl_setopt($this->clientCurl, CURLOPT_URL, $url);
        curl_setopt($this->clientCurl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($this->clientCurl, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->clientCurl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->clientCurl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->clientCurl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->clientCurl, CURLOPT_POST, true);

    }


    /**
     * @param $content
     */
    private function setContet($content)
    {
        $this->addHeader("Content-length: " . strlen($content));
        curl_setopt($this->clientCurl, CURLOPT_POSTFIELDS, $content);
        curl_setopt($this->clientCurl, CURLOPT_HTTPHEADER, $this->headers);
    }

    /**
     * Añade un header a la lista de headers
     * @param $header
     */
    public function addHeader($header)
    {
        $this->headers[] = $header;
    }

    /**
     * Establece los headers de la peticion
     * @param $headers
     */
    public function setHeaders($headers)
    {
        if(is_array($headers)){
            $this->headers = $headers;
        }

    }

    /**
     * Se encarga de enviar la solicitud
     * @param $body
     */
    public function send(\DOMDocument $content): Response
    {
        $domBody = new BodyRequestDOM($content);
        $domBody->storeStructure();
        $this->setContet((string)$domBody);
        $responseRAW = curl_exec($this->clientCurl);
        return new Response($this->clientCurl,$responseRAW);
    }


}