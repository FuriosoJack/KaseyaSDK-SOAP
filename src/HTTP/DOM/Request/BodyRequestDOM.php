<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;

/**
 * Class BodyDOM
 * @package FuriosoJack\KaseyaSDKSOAP\Request\DOM
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class BodyRequestDOM extends BasicDOM
{


    /**
     * @var \DOMDocument
     */
    private $elementBody;

    /**
     * BodyRequestDOM constructor.
     * @param \DOMDocument $elementBody
     */
    public function __construct(\DOMDocument $elementBody)
    {
        parent::__construct();
        $this->elementBody = $elementBody;
    }


    public function compose()
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

        $element->appendChild($elementBody);
        $this->domDocument->appendChild($element);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->domDocument->saveXML();
    }



}