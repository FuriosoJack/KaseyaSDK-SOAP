<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Elements;

/**
 * Class Org
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Elements
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Org{

    /**
     * @var
     */
    private $orgID;

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
    private $customerID;

    /**
     * Org constructor.
     * @param $orgID
     * @param $orgRef
     * @param $orgName
     * @param $customerID
     */
    public function __construct($orgID, $orgRef, $orgName, $customerID)
    {
        $this->orgID = $orgID;
        $this->orgRef = $orgRef;
        $this->orgName = $orgName;
        $this->customerID = $customerID;
    }


    /**
     * @return mixed
     */
    public function getOrgID()
    {
        return $this->orgID;
    }

    /**
     * @param mixed $orgID
     */
    public function setOrgID($orgID)
    {
        $this->orgID = $orgID;
    }

    /**
     * @return mixed
     */
    public function getOrgRef()
    {
        return $this->orgRef;
    }

    /**
     * @param mixed $orgRef
     */
    public function setOrgRef($orgRef)
    {
        $this->orgRef = $orgRef;
    }

    /**
     * @return mixed
     *
     */
    public function getOrgName()
    {
        return $this->orgName;
    }

    /**
     * @param mixed $orgName
     */
    public function setOrgName($orgName)
    {
        $this->orgName = $orgName;
    }

    /**
     * @return mixed
     */
    public function getCustomerID()
    {
        return $this->customerID;
    }

    /**
     * @param mixed $customerID
     */
    public function setCustomerID($customerID)
    {
        $this->customerID = $customerID;
    }

}