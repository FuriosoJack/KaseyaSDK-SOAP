<?php
namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response\GetOrgsResponseDOM;

/**
 * Class GetOrgsRequestDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class GetOrgsRequestDOM extends BasicRequestDOM
{


    public function compose()
    {
        $elementBasic = $this->domDocument->createElementNS("KaseyaWS","GetOrgs",null);

        $elementReq = $this->domDocument->createElement("req");

        $elementSession = $this->domDocument->createElement("SessionID",$this->sessionID);

        $elementReq->appendChild($elementSession);

        $elementBasic->appendChild($elementReq);

        $this->domDocument->appendChild($elementBasic);


    }

    public function getHeader():string
    {
        return 'SOAPAction: "KaseyaWS/GetOrgs"';
    }

    /**
     * Devuelve la clase response que va a tener el request
     * @return mixed
     */
    public function getClassResponse()
    {
        return GetOrgsResponseDOM::class;
    }
}