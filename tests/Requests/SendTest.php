<?php
namespace FuriosoJack\KaseyaSDKSOAP\Tests\Requests;
use FuriosoJack\KaseyaSDKSOAP\HTTP\Auth\Credentials;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AddScopeRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AuthRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\GetOrgsRequestDOM;
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
     * Abre una session
     */
    public function testSession()
    {
        $credential = new Credentials(getenv("USERNAME_SERVER"),getenv("PASSWORD_SERVER"));
        $session = new Session($credential,getenv('URL_SERVER'));
        if($session->auth()){
            $this->assertTrue($session->getAuthResponseDOM() != null);
        }else{
            $this->assertTrue(false);
        }

    }

    public function testGetOrgs()
    {
        $credential = new Credentials(getenv("USERNAME_SERVER"),getenv("PASSWORD_SERVER"));
        $session = new Session($credential,getenv('URL_SERVER'));


        if($session->auth())
        {
            $response = $session->request(new GetOrgsRequestDOM($session->getAuthResponseDOM()->getSessionID()));
            $domResponse = $response->getResponseDOM();

            var_dump($response->getBody());
            var_dump($domResponse->getOrgs());
        }





    }

}