<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;

/**
 * Class BodyDOM
 * @package FuriosoJack\KaseyaSDKSOAP\Request\DOM
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class BodyRequestDOM
{

    private $domDocumnet;

    private $elementBody;

    public function __construct(\DOMDocument $elementBody)
    {
        $this->domDocumnet = new \DOMDocument();
        $this->elementBody = $elementBody;
    }




    public function storeStructure()
    {
        $element = $this->domDocumnet->createElementNS("http://schemas.xmlsoap.org/soap/envelope/","soap:Envelope");
        $atributens = $this->domDocumnet->createAttribute("xmlns:xsi");
        $atributens->value = "http://www.w3.org/2001/XMLSchema-instance";

        $atributens2 = $this->domDocumnet->createAttribute("xmlns:xsd");
        $atributens2->value = "http://www.w3.org/2001/XMLSchema";

        $element->appendChild($atributens);
        $element->appendChild($atributens2);



        $elementBody = $this->domDocumnet->createElement("soap:Body");


        //Solo se añade el nodo si no esta vacio
        if($this->elementBody->firstChild != null){
            $node = $this->domDocumnet->importNode($this->elementBody->firstChild,TRUE);
            $elementBody->appendChild($node);
        }

        $element->appendChild($elementBody);
        $this->domDocumnet->appendChild($element);

    }


    public function __toString()
    {
        return $this->domDocumnet->saveXML();
    }


}