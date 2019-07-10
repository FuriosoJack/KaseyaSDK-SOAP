<?php


namespace FuriosoJack\KaseyaSDKSOAP\Request\DOM;

/**
 * Class AuthDOM
 * @package FuriosoJack\KaseyaSDKSOAP\Request\DOM
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AuthDOM
{

    private $domDocument;

    private $username;
    private $coredPassword;
    private $randomKey;
    private $algorithm;


    public function __construct()
    {
        $this->domDocument = new \DOMDocument();

    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $coredPassword
     */
    public function setCoredPassword($coredPassword)
    {
        $this->coredPassword = $coredPassword;
    }

    /**
     * @param mixed $randomKey
     */
    public function setRandomKey($randomKey)
    {
        $this->randomKey = $randomKey;
    }

    /**
     * @param mixed $algorithm
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;
    }


    public function storeStructure()
    {


        $elementAuthenticate = $this->domDocument->createElementNS("KaseyaWS","Authenticate",null);

        $nodeReq = $this->domDocument->createElement("req");


        $nodeUserName = $this->domDocument->createElement("UserName",$this->username);
        $nodeReq->appendChild($nodeUserName);

        $nodeCoveredPassword = $this->domDocument->createElement("CoveredPassword",$this->coredPassword);
        $nodeReq->appendChild($nodeCoveredPassword);

        $nodeRandomNumber = $this->domDocument->createElement("RandomNumber",$this->randomKey);
        $nodeReq->appendChild($nodeRandomNumber);

        $nodeHashingAlgorithm = $this->domDocument->createElement("HashingAlgorithm",$this->algorithm);
        $nodeReq->appendChild($nodeHashingAlgorithm);

        $elementAuthenticate->appendChild($nodeReq);
        $this->domDocument->appendChild($elementAuthenticate);
    }


    public function getDocument():\DOMDocument
    {
        return $this->domDocument;
    }

    public function __toString()
    {
        $element = $this->domDocument->firstChild;
        $xmlString = $this->domDocument->saveXML($element);
        return $xmlString;
    }


}