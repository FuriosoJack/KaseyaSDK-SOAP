<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;

/**
 * Class AddScopeRequestDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AddScopeRequestDOM extends BasicDOM
{

    /**
     * @var
     */
    private $scope;

    /**
     * @var
     */
    private $sessionID;

    /**
     * AddScopeRequestDOM constructor.
     * @param $scope
     * @param $sessionID
     */
    public function __construct($scope, $sessionID)
    {
        parent::__construct();
        $this->scope = $scope;
        $this->sessionID = $sessionID;
    }


    public function compose()
    {
        $elementBase = $this->domDocument->createElementNS("KaseyaWS","AddScope",null);

        $elementREQ = $this->domDocument->createElement("req");
        $elementScope = $this->domDocument->createElement("ScopeName",$this->scope);
        $elementSession = $this->domDocument->createElement("SessionID",$this->sessionID);
        $elementREQ->appendChild($elementScope);
        $elementREQ->appendChild($elementSession);
        $elementBase->appendChild($elementREQ);
        $this->domDocument->appendChild($elementBase);
    }

    public static function getHeader()
    {
        return 'SOAPAction: "KaseyaWS/AddScope"';
    }
}