<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request;

/**
 * Class AuthDOM
 * @package FuriosoJack\KaseyaSDKSOAP\Request\DOM
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AuthRequestDOM
{

    /**
     * @var \DOMDocument
     */
    private $domDocument;

    /**
     * @var
     */
    private $username;

    /**
     * @var
     */
    private $coredPassword;

    /**
     * @var
     */
    private $randomKey;

    /**
     * @var
     */
    private $algorithm;


    /**
     * AuthRequestDOM constructor.
     */
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

    /**
     * Se encarga de crea la estructura del DOM
     */
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


    /**
     * @return \DOMDocument
     */
    public function getDocument():\DOMDocument
    {
        return $this->domDocument;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $element = $this->domDocument->firstChild;
        $xmlString = $this->domDocument->saveXML($element);
        return $xmlString;
    }


}