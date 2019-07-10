<?php


namespace FuriosoJack\KaseyaSDKSOAP\Tests\Requests;
use Codwelt\HelpersMan\HelpersMan;
use FuriosoJack\KaseyaSDKSOAP\Request\DOM\AuthDOM;
use FuriosoJack\KaseyaSDKSOAP\Request\DOM\BodyDOM;
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
        $domAuth = new AuthDOM();
        $domAuth->setAlgorithm("SHA-256");
        $domAuth->setCoredPassword($coredPassword);
        $domAuth->setRandomKey($randomKey);
        $domAuth->setUsername(getenv("USERNAME_SERVER"));
        $domAuth->storeStructure();

        $this->assertIsString((string)$domAuth);

    }

    /**
     * Hace el test a la creacion del Body
     * @throws \Exception
     */
    public function testBody()
    {


        $randomKey = HelpersMan::random_string(14, "0123456789");

        $coredPassword = hash('sha256', hash('sha256', getenv("PASSWORD_SERVER") . getenv("USERNAME_SERVER")) . $randomKey);

        //Se crea el contenido de la peticion
        $domAuth = new AuthDOM();
        $domAuth->setAlgorithm("SHA-256");
        $domAuth->setCoredPassword($coredPassword);
        $domAuth->setRandomKey($randomKey);
        $domAuth->setUsername(getenv("USERNAME_SERVER"));
        $domAuth->storeStructure();

        $domBody = new BodyDOM($domAuth->getDocument());
        $domBody->storeStructure();

        $this->assertIsString((string)$domBody);
    }

}