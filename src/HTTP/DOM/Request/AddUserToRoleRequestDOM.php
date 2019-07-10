<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;

/**
 * Class AddUserToRoleRequestDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AddUserToRoleRequestDOM extends BasicDOM
{

    private $userName;
    private $roleID;
    private $sessionID;

    /**
     * AddUserToRoleRequestDOM constructor.
     * @param $userName
     * @param $roleID
     * @param $sessionID
     */
    public function __construct($userName, $roleID, $sessionID)
    {
        parent::__construct();
        $this->userName = $userName;
        $this->roleID = $roleID;
        $this->sessionID = $sessionID;
    }


    public function compose()
    {

        $elementBasic = $this->domDocument->createElementNS("KaseyaWS","AddUserToRole",null);

        $elementRQ = $this->domDocument->createElement("rq");

        $elementUserName = $this->domDocument->createElement("UserName",$this->userName);
        $elementRoleID = $this->domDocument->createElement("RoleID",$this->roleID);
        $elementSessionID = $this->domDocument->createElement("SessionID",$this->sessionID);

        $elementRQ->appendChild($elementUserName);
        $elementRQ->appendChild($elementRoleID);
        $elementRQ->appendChild($elementSessionID);

        $elementBasic->appendChild($elementRQ);

        $this->domDocument->appendChild($elementBasic);

    }

    public static function getHeader()
    {
        return 'SOAPAction: "KaseyaWS/AddUserToRole"';
    }
}