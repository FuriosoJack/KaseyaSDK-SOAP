<?php
namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response\AddScopeResponseDOM;

/**
 * Class AddScopeRequestDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AddScopeRequestDOM extends BasicRequestDOM
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

    public function getHeader():string
    {
        return 'SOAPAction: "KaseyaWS/AddScope"';
    }

    /**
     * Devuelve la clase response que va a tener el request
     * @return mixed
     */
    public function getClassResponse()
    {
        return AddScopeResponseDOM::class;
    }
}