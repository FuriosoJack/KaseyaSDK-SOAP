<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;

/**
 * Class BasicDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
abstract class BasicRequestDOM
{
    /**
     * @var \DOMDocument
     */
    protected $domDocument;


    /**
     * BasicRequestDOM constructor.
     */
    public function __construct()
    {
        $this->domDocument = new \DOMDocument();
    }


    /**
     * Se encarga de construir los nodos del dom
     * @return void
     */
    public abstract function compose();

    /**
     * Devuelve la clase response que va a tener el request
     * @return mixed
     */
    public abstract function getClassResponse();

    /**
     * Devuelve el valor del header que va tener la peticion
     * @return string
     */
    public abstract function getHeader(): string;


    /**
     * @return \DOMDocument
     */
    public function getDomDocument():\DOMDocument
    {
        return $this->domDocument;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $element = $this->domDocument->firstChild;
        $xmlString = $this->domDocument->saveXML($element);
        return $xmlString;
    }


}