<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;

/**
 * Class BasicDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
abstract class BasicDOM
{
    protected $domDocument;


    public function __construct()
    {
        $this->domDocument = new \DOMDocument();
    }

    public abstract function compose();



}