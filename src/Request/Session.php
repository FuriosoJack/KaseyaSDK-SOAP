<?php


namespace FuriosoJack\KaseyaSDKSOAP\Request;
use Codwelt\HelpersMan\Exception;
use Codwelt\HelpersMan\HelpersMan;
use FuriosoJack\KaseyaSDKSOAP\Request\Auth\Credentials;
use FuriosoJack\KaseyaSDKSOAP\Request\DOM\AuthDOM;


/**
 * Class Session
 * @package FuriosoJack\KaseyaSDKSOAP\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Session
{

    private $credentials;
    private $urlServer;

    public function __construct(Credentials $credentials,$urlServer)
    {
        $this->credentials = $credentials;
        $this->urlServer =  $urlServer;
    }




    private function auth()
    {
        $request = new Request($this->urlServer);

        $request->addHeader('SOAPAction: "KaseyaWS/Authenticate"');

        $randomKey = HelpersMan::random_string(14, "0123456789");
        $coredPassword = hash('sha256', hash('sha256', $this->credentials->getPassword() . $this->credentials->getUsername()) . $randomKey) .

        //Se crea el contenido de la peticion
        $domAuth = new AuthDOM();
        $domAuth->setAlgorithm("SHA-256");
        $domAuth->setCoredPassword($coredPassword);
        $domAuth->setRandomKey($randomKey);
        $domAuth->setUsername($this->credentials->getUsername());




    }





}