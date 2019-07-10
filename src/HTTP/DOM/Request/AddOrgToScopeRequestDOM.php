<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;

/**
 * Class AddOrgToScopeRequestDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AddOrgToScopeRequestDOM extends BasicDOM
{

    /**
     * @var
     */
    private $companyID;

    /**
     * @var
     */
    private $scopeID;

    /**
     * @var
     */
    private $sessionID;

    /**
     * AddOrgToScopeRequestDOM constructor.
     * @param $companyID
     * @param $scopeID
     * @param $sessionID
     */
    public function __construct($companyID, $scopeID, $sessionID)
    {
        parent::__construct();
        $this->companyID = $companyID;
        $this->scopeID = $scopeID;
        $this->sessionID = $sessionID;
    }


    public function compose()
    {
        $elementBase = $this->domDocument->createElementNS("KaseyaWS","AddOrgToScope",null);

        $elementRQ = $this->domDocument->createElement("req");

        $elementCompany = $this->domDocument->createElement("CompanyID",$this->companyID);
        $elementScopeID = $this->domDocument->createElement("ScopeID",$this->scopeID);
        $elementSessionID = $this->domDocument->createElement("SessionID",$this->sessionID);

        $elementRQ->appendChild($elementCompany);
        $elementRQ->appendChild($elementScopeID);
        $elementRQ->appendChild($elementSessionID);
        $elementBase->appendChild($elementRQ);
        $this->domDocument->appendChild($elementBase);
    }

    public static function getHeader()
    {
        return 'SOAPAction: "KaseyaWS/AddOrgToScope"';
    }
}