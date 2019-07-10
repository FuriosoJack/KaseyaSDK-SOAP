<?php
namespace FuriosoJack\KaseyaSDKSOAP\Tests\Requests;
use FuriosoJack\KaseyaSDKSOAP\HTTP\Auth\Credentials;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AuthRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\Request;
use FuriosoJack\KaseyaSDKSOAP\HTTP\Session;
use FuriosoJack\KaseyaSDKSOAP\Tests\TestCase;

/**
 * Class SendTest
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class SendTest extends TestCase
{

    /**
     * Hace el test para servidor sassas
     */
    public function testSendAuth()
    {
        $url = getenv('URL_SERVER');
        $request = new Request($url);
        $response = $request->send(new \DOMDocument());
        $this->assertIsInt(200,$response->getStatusCode());
    }

    /**
     * Abre una session
     */
    public function testSession()
    {
        $credential = new Credentials(getenv("USERNAME_SERVER"),getenv("PASSWORD_SERVER"));
        $session = new Session($credential,getenv('URL_SERVER'));
        $session->auth();
        $this->assertTrue($session->getAuthResponseDOM() != null);
    }

}