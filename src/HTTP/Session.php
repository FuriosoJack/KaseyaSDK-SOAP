<?php
namespace FuriosoJack\KaseyaSDKSOAP\HTTP;
use Codwelt\HelpersMan\HelpersMan;
use FuriosoJack\KaseyaSDKSOAP\HTTP\Auth\Credentials;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AuthRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\BasicRequestDOM;
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
    private $host;

    /**
     * @var
     */
    private $authResponseDOM;

    /**
     * Session constructor.
     * @param Credentials $credentials
     * @param $urlServer
     */
    public function __construct(Credentials $credentials,$host)
    {
        $this->credentials = $credentials;
        $this->host =  $host;

    }

    /*
     * Ejecuta la peticion para la autenticacion
     */
    public function auth()
    {
        $request = new Request($this->host);

        $randomKey = HelpersMan::random_string(14, "0123456789");

        $coredPassword = hash('sha256', hash('sha256', $this->credentials->getPassword() . $this->credentials->getUsername()) . $randomKey);

        //Se crea el contenido de la peticion
        $domAuth = new AuthRequestDOM();
        $domAuth->setAlgorithm("SHA-256");
        $domAuth->setCoredPassword($coredPassword);
        $domAuth->setRandomKey($randomKey);
        $domAuth->setUsername($this->credentials->getUsername());

        $response =  $request->send($domAuth);
        if($response->isSuccess()) {
            $this->authResponseDOM = $response->getResponseDOM();
            return true;
        }
        return false;

    }

    /**
     * @return AuthResponseDOM
     */
    public function getAuthResponseDOM(): AuthResponseDOM
    {
        return $this->authResponseDOM;
    }


    public function request(BasicRequestDOM $domBasic): Response
    {
        $request = new Request($this->host);
        return $request->send($domBasic);
    }



}