<?php
namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response\CreateAdminResponseDOM;

/**
 * Class clase de la estrucura XML para crear un usuario
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class CreateAdminRequestDOM extends BasicRequestDOM
{

    /**
     * @var
     */
    private $emailAddr;

    /**
     * @var
     */
    private $userName;

    /**
     * @var
     */
    private $roleID;

    /**
     * @var
     */
    private $scopeID;

    /**
     * @var
     */
    private $coveredPassword;

    /**
     * @var
     */
    private $forceNewPassword;

    /**
     * @var
     */
    private $firstName;

    /**
     * @var
     */
    private $lastName;

    /**
     * @var
     */
    private $staffDeptRef;

    /**
     * @var
     */
    private $staffMemberRef;


    /**
     * CreateAdminRequestDOM constructor.
     * @param $emailAddr
     * @param $userName
     * @param $roleID
     * @param $scopeID
     * @param $coveredPassword
     * @param $forceNewPassword
     * @param $firstName
     * @param $lastName
     * @param $staffDeptRef
     * @param $staffMemberRef
     * @param $sessionID
     */
    public function __construct($emailAddr, $userName, $roleID, $scopeID, $coveredPassword, $forceNewPassword, $firstName, $lastName, $staffDeptRef, $staffMemberRef, $sessionID)
    {
        parent::__construct($sessionID);
        $this->emailAddr = $emailAddr;
        $this->userName = $userName;
        $this->roleID = $roleID;
        $this->scopeID = $scopeID;
        $this->coveredPassword = $coveredPassword;
        $this->forceNewPassword = $forceNewPassword;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->staffDeptRef = $staffDeptRef;
        $this->staffMemberRef = $staffMemberRef;
    }


    public function compose()
    {
        $elementBase = $this->domDocument->createElementNS("KaseyaWS","CreateAdmin",null);
        $elementREQ = $this->domDocument->createElement("req");

        $elementAddr = $this->domDocument->createElement("EmailAddr",$this->emailAddr);
        $elementusername = $this->domDocument->createElement("UserName",$this->userName);
        $elementroleID = $this->domDocument->createElement("RoleID",$this->roleID);
        $elementScopeID = $this->domDocument->createElement("ScopeID",$this->scopeID);
        $elementCoveredPassword = $this->domDocument->createElement("CoveredPassword",$this->coveredPassword);
        $elementForceNewPassword = $this->domDocument->createElement("ForceNewPassword",$this->forceNewPassword);
        $elementFirstName = $this->domDocument->createElement("FirstName",$this->firstName);
        $elementlastName = $this->domDocument->createElement("LastName",$this->lastName);
        $elementstaffDeptRef = $this->domDocument->createElement("StaffDeptRef",$this->staffDeptRef);
        $elementstaffMemberRef = $this->domDocument->createElement("StaffMemberRef",$this->staffMemberRef);
        $elementsessionID = $this->domDocument->createElement("SessionID",$this->sessionID);

        $elementREQ->appendChild($elementAddr);
        $elementREQ->appendChild($elementusername);
        $elementREQ->appendChild($elementroleID);
        $elementREQ->appendChild($elementScopeID);
        $elementREQ->appendChild($elementCoveredPassword);
        $elementREQ->appendChild($elementForceNewPassword);
        $elementREQ->appendChild($elementFirstName);
        $elementREQ->appendChild($elementlastName);
        $elementREQ->appendChild($elementstaffDeptRef);
        $elementREQ->appendChild($elementstaffMemberRef);
        $elementREQ->appendChild($elementsessionID);
        $elementBase->appendChild($elementREQ);

        $this->domDocument->appendChild($elementBase);


    }

    public function getHeader():string
    {
        return 'SOAPAction: "KaseyaWS/CreateAdmin"';
    }

    /**
     * Devuelve la clase response que va a tener el request
     * @return mixed
     */
    public function getClassResponse()
    {
        return CreateAdminResponseDOM::class;
    }
}
