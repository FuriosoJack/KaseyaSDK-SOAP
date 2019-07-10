<?php


namespace FuriosoJack\KaseyaSDKSOAP\Tests\Requests;
use Codwelt\HelpersMan\HelpersMan;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AuthRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\BodyRequestDOM;
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


}