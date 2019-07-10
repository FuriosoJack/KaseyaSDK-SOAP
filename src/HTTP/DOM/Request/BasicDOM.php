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

    public function getDomDocument():\DOMDocument
    {
        return $this->domDocument;
    }

    public abstract static function getHeader();


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