<?php


namespace FuriosoJack\KaseyaSDKSOAP\Request\Auth;

/**
 * Class Credentials
 * @package FuriosoJack\KaseyaSDKSOAP\Request\Auth
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Credentials
{
    private $username;
    private $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;

        $this->password = $password;
    }


    /**
     * Devuelve el password encriptado en sha256
     * @return string
     */
    public function getEncriptPassword()
    {
        return hash("sha256",$this->password);
    }

    /**
     * devuelve el usuario
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
}