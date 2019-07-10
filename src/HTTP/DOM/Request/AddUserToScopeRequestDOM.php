<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;

/**
 * Class AddUserToScopeRequestDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AddUserToScopeRequestDOM extends BasicDOM
{

    /**
     * @var
     */
    private $userName;

    /**
     * @var
     */
    private $scopeID;

    /**
     * @var
     */
    private $sessionID;

    /**
     * AddUserToScopeRequestDOM constructor.
     * @param $userName
     * @param $scopeID
     * @param $sessionID
     */
    public function __construct($userName, $scopeID, $sessionID)
    {
        parent::__construct();
        $this->userName = $userName;
        $this->scopeID = $scopeID;
        $this->sessionID = $sessionID;
    }


    public function compose()
    {
        $elementBase = $this->domDocument->createAttributeNS("KaseyaWS","AddUserToScope");

        $elementRQ = $this->domDocument->createElement("req");

        $elementUserName = $this->domDocument->createElement("UserName",$this->userName);
        $elementScopeID = $this->domDocument->createElement("ScopeID",$this->scopeID);
        $elementSessionID = $this->domDocument->createElement("SessionID",$this->sessionID);

        $elementRQ->appendChild($elementUserName);
        $elementRQ->appendChild($elementScopeID);
        $elementRQ->appendChild($elementSessionID);

        $elementBase->appendChild($elementRQ);

        $this->domDocument->appendChild($elementBase);



    }

    public static function getHeader()
    {
        return 'SOAPAction: "KaseyaWS/AddUserToScope"';
    }
}