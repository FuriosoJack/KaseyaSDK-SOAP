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

    protected function getBodyDOM()
    {
        $element = $this->domDocument->createElementNS("http://schemas.xmlsoap.org/soap/envelope/","soap:Envelope");
        $atributens = $this->domDocument->createAttribute("xmlns:xsi");
        $atributens->value = "http://www.w3.org/2001/XMLSchema-instance";

        $atributens2 = $this->domDocument->createAttribute("xmlns:xsd");
        $atributens2->value = "http://www.w3.org/2001/XMLSchema";

        $element->appendChild($atributens);
        $element->appendChild($atributens2);



        $elementBody = $this->domDocument->createElement("soap:Body");


        //Solo se añade el nodo si no esta vacio
        if($this->elementBody->firstChild != null){
            $node = $this->domDocument->importNode($this->elementBody->firstChild,TRUE);
            $elementBody->appendChild($node);
        }


    }

    public abstract function compose();

    public abstract static function getHeader();



}