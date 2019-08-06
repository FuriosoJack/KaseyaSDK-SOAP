<?php
namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response\DisableAdminResponse;

/**
 * Class DisableAdmin
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class DisableAdminRequest extends BasicRequestDOM
{


    /**
     * Nombre del usuario
     * @var
     */
    private $adminName;

    /**
     * @var
     */
    private $browserIP;

    /**
     * DisableAdminRequest constructor.
     * @param $adminName
     * @param $browserIP
     * @param $sessionID
     */
    public function __construct($adminName, $browserIP, $sessionID)
    {
        parent::__construct($sessionID);
        $this->adminName = $adminName;
        $this->browserIP = $browserIP;
    }


    /**
     * Se encarga de construir los nodos del dom
     * @return void
     */
    public function compose()
    {
        $elementBase = $this->domDocument->createElementNS("KaseyaWS","DisableAdmin",null);
        $elementREQ = $this->domDocument->createElement("req");

        $elementAdminName = $this->domDocument->createElement("AdminName",$this->adminName);
        $elementBrowser = $this->domDocument->createElement("BrowserIP",$this->browserIP);
        $elementSeissionID = $this->domDocument->createElement("SessionID",$this->sessionID);

        $elementREQ->appendChild($elementAdminName);
        $elementREQ->appendChild($elementBrowser);
        $elementREQ->appendChild($elementSeissionID);

        $elementBase->appendChild($elementREQ);
    }

    /**
     * Devuelve la clase response que va a tener el request
     * @return mixed
     */
    public function getClassResponse()
    {
        return  DisableAdminResponse::class;
    }

    /**
     * Devuelve el valor del header que va tener la peticion
     * @return string
     */
    public function getHeader(): string
    {
        return 'SOAPAction: "KaseyaWS/DisableAdmin"';
    }
}