<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response\AddOrgResponseDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response\AuthResponseDOM;

/**
 * Class AddOrgRequestDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AddOrgRequestDOM extends BasicRequestDOM
{


    /**
     * @var
     */
    private $orgRef;
    /**
     * @var
     */
    private $orgName;
    /**
     * @var
     */
    private $defaultDeptName;

    /**
     * @var
     */
    private $defaultMgName;
    /**
     * @var
     */
    private $orgParentRef;

    /**
     * @var
     */
    private $orgType;

    /**
     * @var
     */
    private $sessionID;

    /**
     * AddOrgRequestDOM constructor.
     * @param $orgRef
     * @param $orgName
     * @param $defaultDeptName
     * @param $defaultMgName
     * @param $orgParentRef
     * @param $orgType
     * @param $sessionID
     */
    public function __construct($orgRef, $orgName, $defaultDeptName, $defaultMgName, $orgParentRef, $orgType, $sessionID)
    {
        parent::__construct();
        $this->orgRef = $orgRef;
        $this->orgName = $orgName;
        $this->defaultDeptName = $defaultDeptName;
        $this->defaultMgName = $defaultMgName;
        $this->orgParentRef = $orgParentRef;
        $this->orgType = $orgType;
        $this->sessionID = $sessionID;
    }


    public function compose()
    {
        $elementBase = $this->domDocument->createElementNS("KaseyaWS","AddOrg",null);
        $elementREQ  = $this->domDocument->createElement("req");

        $elementrorgRef = $this->domDocument->createElement("orgRef",$this->orgRef);
        $elementrorgorgName = $this->domDocument->createElement("orgName",$this->orgName);
        $elementrorgdefaultDeptName = $this->domDocument->createElement("defaultDeptName",$this->defaultDeptName);
        $elementrorgdefaultMgName = $this->domDocument->createElement("defaultMgName",$this->defaultMgName);
        $elementrorgorgParentRef = $this->domDocument->createElement("orgParentRef",$this->orgParentRef);
        $elementrorgorgType = $this->domDocument->createElement("orgType",$this->orgType);
        $elementrorgsessionID = $this->domDocument->createElement("SessionID",$this->sessionID);


        $elementREQ->appendChild($elementrorgRef);
        $elementREQ->appendChild($elementrorgorgName);
        $elementREQ->appendChild($elementrorgdefaultDeptName);
        $elementREQ->appendChild($elementrorgdefaultMgName);
        $elementREQ->appendChild($elementrorgorgParentRef);
        $elementREQ->appendChild($elementrorgorgType);
        $elementREQ->appendChild($elementrorgsessionID);

        $elementBase->appendChild($elementREQ);

        $this->domDocument->appendChild($elementBase);



    }

    public function getHeader():string
    {
        return 'SOAPAction: "KaseyaWS/AddOrg"';
    }

    /**
     * Devuelve la clase response que va a tener el request
     * @return mixed
     */
    public function getClassResponse()
    {
        return AddOrgResponseDOM::class;
    }
}