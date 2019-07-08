<?php


namespace FuriosoJack\KaseyaSDKSOAP\Request;
use FuriosoJack\KaseyaSDKSOAP\Request\Auth\Credentials;

/**
 * Class Session
 * @package FuriosoJack\KaseyaSDKSOAP\Request
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Session
{

    private $credentials;

    public function __construct(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }




    private function auth()
    {

    }





}