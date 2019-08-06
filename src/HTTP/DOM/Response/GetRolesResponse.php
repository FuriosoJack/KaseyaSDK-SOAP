<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Elements\Role;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\GetRolesRequest;

/**
 * Class GetRolesResponse
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class GetRolesResponse extends BasicResponseDOM
{

    private $roles;
    /**
     * Metodo que se encarga de convertir los valores del dom en atributos del objeto
     * @return mixed
     */
    protected function descompose()
    {
        $this->roles = [];


        $elementRoles = $this->domDocument->getElementsByTagName("Role");

        $size = $elementRoles->length;
        for ($i = 0; $i < $size; $i++) {

            $this->roles[] = new Role($elementRoles[$i]->getElementsByTagName("RoleID")->item(0)->textContent,
                (bool)$elementRoles[$i]->getElementsByTagName("IsActive")->item(0)->textContent
            );
        }

    }

    public function getRoles()
    {
        return $this->roles;
    }
}