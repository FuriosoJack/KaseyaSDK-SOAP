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
     *
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
     * Establece la configuracion basica
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
     * Asigna el contenido de la peticion
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


    private function buildDOMBody($elementBody)
    {
        $domDocument = new \DOMDocument();
        $element = $domDocument->createElementNS("http://schemas.xmlsoap.org/soap/envelope/","soap:Envelope");
        $atributens = $domDocument->createAttribute("xmlns:xsi");
        $atributens->value = "http://www.w3.org/2001/XMLSchema-instance";

        $atributens2 = $domDocument->createAttribute("xmlns:xsd");
        $atributens2->value = "http://www.w3.org/2001/XMLSchema";

        $element->appendChild($atributens);
        $element->appendChild($atributens2);



        $elementContent = $domDocument->createElement("soap:Body");


        //Solo se añade el nodo si no esta vacio
        if($elementBody->firstChild != null){
            $node = $domDocument->importNode($elementBody->firstChild,TRUE);
            $elementContent->appendChild($node);
        }

        $element->appendChild($elementContent);
        $domDocument->appendChild($element);

        return $domDocument->saveXML();
    }

    /**
     * Se encarga de enviar la solicitud
     * @param $body
     */
    public function send(\DOMDocument $content): Response
    {
        $this->setContet($this->buildDOMBody($content));
        $responseRAW = curl_exec($this->clientCurl);
        return new Response($this->clientCurl,$responseRAW);
    }


}