<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response;

/**
 * Class AddScopeResponseDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class AddScopeResponseDOM extends BasicResponseDOM
{

    private $scopeOutId;
    /**
     * Metodo que se encarga de convertir los valores del dom en atributos del objeto
     * @return mixed
     */
    protected function descompose()
    {

        $this->scopeOutId = $this->domDocument->getElementsByTagName("scopeOutId")->item(0)->textContent;
    }

    /**
     * @return mixed
     */
    public function getScopeOutId()
    {
        return $this->scopeOutId;
    }


}