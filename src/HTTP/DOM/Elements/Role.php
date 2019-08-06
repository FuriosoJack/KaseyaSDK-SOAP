<?php


namespace FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Elements;

/**
 * Class Role
 * @package FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Elements
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class Role
{

    /**
     * @var
     */
    private $roleId;

    /**
     * @var
     */
    private $isActivate;

    /**
     * Role constructor.
     * @param $roleId
     * @param $isActivate
     */
    public function __construct(string $roleId, bool $isActivate)
    {
        $this->roleId = $roleId;
        $this->isActivate = $isActivate;
    }

    /**
     * @return string
     */
    public function getRoleId(): string
    {
        return $this->roleId;
    }

    /**
     * @return bool
     */
    public function getisActivate(): bool
    {
        return $this->isActivate;
    }




}