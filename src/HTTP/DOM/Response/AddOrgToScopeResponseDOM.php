<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response;

/**
 * Class AddOrgToScopeResponseDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AddOrgToScopeResponseDOM extends BasicResponseDOM
{

    private $orgOutId;
    private $orgOutRef;

    /**
     * Metodo que se encarga de convertir los valores del dom en atributos del objeto
     * @return mixed
     */
    protected function descompose()
    {

        $this->orgOutId = $this->domDocument->getElementsByTagName("orgOutId")->item(0)->textContent;
        $this->orgOutRef = $this->domDocument->getElementsByTagName("orgOutRef")->item(0)->textContent;

    }

    /**
     * @return mixed
     */
    public function getOrgOutId()
    {
        return $this->orgOutId;
    }

    /**
     * @return mixed
     */
    public function getOrgOutRef()
    {
        return $this->orgOutRef;
    }


}