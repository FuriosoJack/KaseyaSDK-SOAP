<?php
namespace FuriosoJack\KaseyaSDKSOAP\Tests\Requests;
use FuriosoJack\KaseyaSDKSOAP\Request\DOM\AuthDOM;
use FuriosoJack\KaseyaSDKSOAP\Request\Request;
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
        $response = $request->send(null);
        $this->assertIsInt(200,$response->getStatusCode());

    }

}