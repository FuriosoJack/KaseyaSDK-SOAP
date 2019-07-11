<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response;

/**
 * Class BasicDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
abstract class BasicResponseDOM
{
    /**
     * @var \DOMDocument
     */
    protected $domDocument;


    /**
     * @var
     */
    private $method;

    /**
     * @var
     */
    private $transactionID;

    /**
     * @var
     */
    private $errorMessage;

    /**
     * @var
     */
    private $errorLocation;


    /**
     * BasicDOM constructor.
     * @param \DOMDocument $domDocument
     */
    public function __construct(\DOMDocument $domDocument)
    {
        $this->domDocument = $domDocument;
        $this->preDespomse();
        $this->descompose();
    }


    /**
     * Se encarga de converitir los atrubutos generales al response
     */
    protected function preDespomse()
    {
        $this->method = $this->domDocument->getElementsByTagName("Method")->item(0)->textContent;
        $this->transactionID = $this->domDocument->getElementsByTagName("TransactionID")->item(0)->textContent;
        $this->errorMessage = $this->domDocument->getElementsByTagName("ErrorMessage")->item(0)->textContent;
        $this->errorLocation = $this->domDocument->getElementsByTagName("ErrorLocation")->item(0)->textContent;
    }

    /**
     * Metodo que se encarga de convertir los valores del dom en atributos del objeto
     * @return mixed
     */
    protected abstract function descompose();


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