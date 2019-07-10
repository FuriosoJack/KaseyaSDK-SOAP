<?php
namespace FuriosoJack\KaseyaSDKSOAP\HTTP;
use Codwelt\HelpersMan\HelpersMan;
use FuriosoJack\KaseyaSDKSOAP\HTTP\Auth\Credentials;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AuthRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response\AuthResponseDOM;


/**
 * Clase que se encarga de hacer peticion bajo un mismo SEssionID
 * @package FuriosoJack\KaseyaSDKSOAP\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Session
{
    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var
     */
    private $urlServer;

    /**
     * @var
     */
    private $authResponseDOM;

    /**
     * Session constructor.
     * @param Credentials $credentials
     * @param $urlServer
     */
    public function __construct(Credentials $credentials,$urlServer)
    {
        $this->credentials = $credentials;
        $this->urlServer =  $urlServer;

    }

    /*
     * Ejecuta la peticion para la autenticacion
     */
    public function auth()
    {
        $request = new Request($this->urlServer);

        $request->addHeader('SOAPAction: "KaseyaWS/Authenticate"');

        $randomKey = HelpersMan::random_string(14, "0123456789");

        $coredPassword = hash('sha256', hash('sha256', $this->credentials->getPassword() . $this->credentials->getUsername()) . $randomKey);

        //Se crea el contenido de la peticion
        $domAuth = new AuthRequestDOM();
        $domAuth->setAlgorithm("SHA-256");
        $domAuth->setCoredPassword($coredPassword);
        $domAuth->setRandomKey($randomKey);
        $domAuth->setUsername($this->credentials->getUsername());
        $domAuth->compose();

        $response =  $request->send($domAuth->getDocument());


        if($response->getStatusCode() == 200){
            $this->authResponseDOM = new AuthResponseDOM($response->getBody(false));
        }

    }

    /**
     * @return AuthResponseDOM
     */
    public function getAuthResponseDOM(): AuthResponseDOM
    {
        return $this->authResponseDOM;
    }



}