<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response;

/**
 * Class AuthResponseDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AuthResponseDOM
{

    private $domDocument;

    private $sessionID;
    private $method;
    private $transactionID;
    private $errorMessage;
    private $errorLocation;



    public function __construct(\DOMDocument $document)
    {
        $this->domDocument = $document;
        $this->descompose();

    }

    /**
     * Se enccarga de descomponer el dom a valores del objeto
     */
    private function descompose()
    {
        $this->sessionID = $this->domDocument->getElementsByTagName("SessionID")->item(0)->textContent;
        $this->method = $this->domDocument->getElementsByTagName("Method")->item(0)->textContent;
        $this->transactionID = $this->domDocument->getElementsByTagName("TransactionID")->item(0)->textContent;
        $this->errorMessage = $this->domDocument->getElementsByTagName("ErrorMessage")->item(0)->textContent;
        $this->errorLocation = $this->domDocument->getElementsByTagName("ErrorLocation")->item(0)->textContent;
    }

    /**
     * @return mixed
     */
    public function getSessionID()
    {
        return $this->sessionID;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getTransactionID()
    {
        return $this->transactionID;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @return mixed
     */
    public function getErrorLocation()
    {
        return $this->errorLocation;
    }




}