<?php
namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response\AddOrgToScopeResponseDOM;


/**
 * Class AddOrgToScopeRequestDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AddOrgToScopeRequestDOM extends BasicRequestDOM
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
     * AddOrgToScopeRequestDOM constructor.
     * @param $companyID
     * @param $scopeID
     * @param $sessionID
     */
    public function __construct($companyID, $scopeID, $sessionID)
    {
        parent::__construct($sessionID);
        $this->companyID = $companyID;
        $this->scopeID = $scopeID;

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

    public function getHeader():string
    {
        return 'SOAPAction: "KaseyaWS/AddOrgToScope"';
    }

    /**
     * Devuelve la clase response que va a tener el request
     * @return mixed
     */
    public function getClassResponse()
    {
        return AddOrgToScopeResponseDOM::class;
    }
}