<?php


namespace FuriosoJack\KaseyaSDKSOAP\Request;

/**
 * Class Request
 * @package FuriosoJack\KaseyaSDKSOAP\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Request
{

    private $clientNuSoap;


    public function __construct($url)
    {
        $this->clientNuSoap = new \nusoap_client($url,true);
    }

    public function setHeaders($headers)
    {
        $this->clientNuSoap->setHeaders($headers);
    }

    public function send($methodCall,$body)
    {
        $this->clientNuSoap->call($methodCall,$body);
    }


}