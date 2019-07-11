<?php


namespace FuriosoJack\KaseyaSDKSOAP\Tests\Requests;
use Codwelt\HelpersMan\HelpersMan;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AddScopeRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AuthRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\BodyRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\CreateAdminRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\GetOrgsRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\Tests\TestCase;

/**
 * Class DomTest
 * @package FuriosoJack\KaseyaSDKSOAP\Tests\Requests
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class DomTest extends TestCase
{

    public function testAuth()
    {

        $randomKey = HelpersMan::random_string(14, "0123456789");

        $coredPassword = hash('sha256', hash('sha256', getenv("PASSWORD_SERVER") . getenv("USERNAME_SERVER")) . $randomKey);

        //Se crea el contenido de la peticion
        $domAuth = new AuthRequestDOM();
        $domAuth->setAlgorithm("SHA-256");
        $domAuth->setCoredPassword($coredPassword);
        $domAuth->setRandomKey($randomKey);
        $domAuth->setUsername(getenv("USERNAME_SERVER"));
        $domAuth->compose();

        $this->assertIsString((string)$domAuth);

    }

    public function testCreateAdmin()
    {
        $domAdmin = new CreateAdminRequestDOM("iam@furiosojack.com","furiosojack","ROLEOID","SCOPEID","COVERPASS",true,"Juan","Diaz","ORGDEP","memeberRTef","1234");
        $domAdmin->compose();
        $this->assertIsString((string)$domAdmin);

    }

    public function testAddScope()
    {
        $scopeDom = new AddScopeRequestDOM("TEST", "testttt");
        $scopeDom->compose();
        $this->assertIsString((string)$scopeDom);

    }

    public function testGetOrgs()
    {
        $getOrgs = new GetOrgsRequestDOM("SESSIONID");
        $getOrgs->compose();
        $this->assertIsString((string)$getOrgs);

    }



}