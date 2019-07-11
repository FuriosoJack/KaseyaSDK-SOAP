<?php
namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Elements\Org;

/**
 * Class GetOrgsResponseResponseDOM
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class GetOrgsResponseDOM extends BasicResponseDOM
{

    private $orgs;

    /**
     * Clase que se encarga de convertir los valores del dom en atributos del objeto
     * @return mixed
     */
    public function descompose()
    {

        $this->orgs = [];

        $elementOrgs = $this->domDocument->getElementsByTagName("Org");

        $size = $elementOrgs->length;
        for ($i = 0; $i < $size; $i++) {

            $this->orgs[] = new Org($elementOrgs[$i]->getElementsByTagName("OrgId")->item(0)->textContent,
                $elementOrgs[$i]->getElementsByTagName("OrgRef")->item(0)->textContent,
                $elementOrgs[$i]->getElementsByTagName("OrgName")->item(0)->textContent,
                $elementOrgs[$i]->getElementsByTagName("CustomerID")->item(0)->textContent
            );
        }
    }


    public function getOrgs()
    {
        return $this->orgs;
    }
}