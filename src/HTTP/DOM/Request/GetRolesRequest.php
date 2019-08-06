<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response\GetRolesResponse;

/**
 * Class GetRolesRquest
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class GetRolesRequest extends BasicRequestDOM
{

    /**
     * Se encarga de construir los nodos del dom
     * @return void
     */
    public function compose()
    {
        $elementBasic = $this->domDocument->createElementNS("KaseyaWS","GetRoles",null);

        $elementReq = $this->domDocument->createElement("req");

        $elementSession = $this->domDocument->createElement("SessionID",$this->sessionID);

        $elementReq->appendChild($elementSession);

        $elementBasic->appendChild($elementReq);

        $this->domDocument->appendChild($elementBasic);





    }

    /**
     * Devuelve la clase response que va a tener el request
     * @return mixed
     */
    public function getClassResponse()
    {
        return GetRolesResponse::class;
    }

    /**
     * Devuelve el valor del header que va tener la peticion
     * @return string
     */
    public function getHeader(): string
    {
        return 'SOAPAction: "KaseyaWS/GetRoles"';
    }
}