<?php
namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response;

/**
 * Class AuthResponseDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AuthResponseDOM extends BasicResponseDOM
{
    /**
     * @var
     */
    private $sessionID;


    /**
     * Se enccarga de descomponer el dom a valores del objeto
     */
    protected function descompose()
    {
        $this->sessionID = $this->domDocument->getElementsByTagName("SessionID")->item(0)->textContent;
    }

    /**
     * @return mixed
     */
    public function getSessionID()
    {
        return $this->sessionID;
    }




}