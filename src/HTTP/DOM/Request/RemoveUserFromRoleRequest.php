<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response\RemoveUserFromRoleResponse;

/**
 * Class RemoveUserFromRoleRequest
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class RemoveUserFromRoleRequest extends BasicRequestDOM
{

    /**
     * @var
     */
    private $roleName;

    /**
     * @var
     */
    private $adminName;


    /**
     * @var
     */
    private $browserIP;

    /**
     * RemoveUserFromRoleRequest constructor.
     * @param $roleName
     * @param $adminName
     * @param $sessionID
     * @param $browserIP
     */
    public function __construct($roleName, $adminName, $sessionID, $browserIP)
    {
        parent::__construct($sessionID);
        $this->roleName = $roleName;
        $this->adminName = $adminName;
        $this->browserIP = $browserIP;
    }


    /**
     * Se encarga de construir los nodos del dom
     * @return void
     */
    public function compose()
    {
        $elementBase = $this->domDocument->createElementNS("KaseyaWS","RemoveUserFromRole",null);
        $elementREQ = $this->domDocument->createElement("req");
        $elementRole = $this->domDocument->createElement("RoleName",$this->roleName);
        $elementAdminName = $this->domDocument->createElement("AdminName",$this->adminName);
        $elementBrowser = $this->domDocument->createElement("BrowserIP",$this->browserIP);
        $elementSessionID = $this->domDocument->createElement("SessionID",$this->browserIP);

        $elementREQ->appendChild($elementRole);
        $elementREQ->appendChild($elementAdminName);
        $elementREQ->appendChild($elementBrowser);
        $elementREQ->appendChild($elementSessionID);
        $elementBase->appendChild($elementREQ);
        $this->domDocument->appendChild($elementBase);

    }

    /**
     * Devuelve la clase response que va a tener el request
     * @return mixed
     */
    public function getClassResponse()
    {
        return RemoveUserFromRoleResponse::class;
    }

    /**
     * Devuelve el valor del header que va tener la peticion
     * @return string
     */
    public function getHeader(): string
    {
        return 'SOAPAction: "KaseyaWS/RemoveUserFromRole"';
    }
}