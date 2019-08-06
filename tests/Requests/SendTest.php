<?php
namespace FuriosoJack\KaseyaSDKSOAP\Tests\Requests;
use FuriosoJack\KaseyaSDKSOAP\HTTP\Auth\Credentials;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AddOrgRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AddScopeRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AddUserToRoleRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AddUserToScopeRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\AuthRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\CreateAdminRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\GetOrgsRequestDOM;
use FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\GetRolesRequest;
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
            $this->assertTrue(count($domResponse->getOrgs()) > 0);

        }else{
            $this->assertTrue(false);
        }
    }

    public function testaddScope()
    {
        $credential = new Credentials(getenv("USERNAME_SERVER"),getenv("PASSWORD_SERVER"));
        $session = new Session($credential,getenv('URL_SERVER'));

        if($session->auth())
        {
            $addScope = new AddScopeRequestDOM("TESTCOP22E",$session->getAuthResponseDOM()->getSessionID() );
            $response = $session->request($addScope);
            if($response->isSuccess()){
                $domResponse = $response->getResponseDOM();
                //No debe existir ningun mensaje para que pase el test, puede ser que el scope ya este creado
                $this->assertTrue(empty($domResponse->getErrorMessage()));
                return;
            }

        }
        $this->assertTrue(false);
    }


    public function testAddOrg()
    {
        $credential = new Credentials(getenv("USERNAME_SERVER"),getenv("PASSWORD_SERVER"));
        $session = new Session($credential,getenv('URL_SERVER'));

        if($session->auth()) {
            $orgAdd = new AddOrgRequestDOM("TESTCOP22E","TESTCOP22E","root","root","null","Internal",$session->getAuthResponseDOM()->getSessionID());

            $response = $session->request($orgAdd);


           $this->assertTrue($response->isSuccess());


        }

    }

    public function testAddUser()
    {
        $credential = new Credentials(getenv("USERNAME_SERVER"),getenv("PASSWORD_SERVER"));
        $session = new Session($credential,getenv('URL_SERVER'));

        if($session->auth()){

            $converPassword = hash("sha256","password"."furiosojack2");
            $createUser = new CreateAdminRequestDOM("iam2@furiosojack.com","furiosojack2","CORPORATE","TESTCOP22E",$converPassword,true,"Juan","Dias","TESTCOP22E","TESTCOP22E.root",$session->getAuthResponseDOM()->getSessionID());
            $response = $session->request($createUser);


            $this->assertTrue($response->isSuccess());

        }

    }

    public function testAddUserToScope()
    {

        $credential = new Credentials(getenv("USERNAME_SERVER"),getenv("PASSWORD_SERVER"));
        $session = new Session($credential,getenv('URL_SERVER'));

        if($session->auth()){

            $addUserDom = new AddUserToScopeRequestDOM("furiosojack2","TESTCOP22E",$session->getAuthResponseDOM()->getSessionID());

            $response = $session->request($addUserDom);

            $this->assertTrue($response->isSuccess());
        }

    }


    public function testAddRoltoUser()
    {
        $credential = new Credentials(getenv("USERNAME_SERVER"),getenv("PASSWORD_SERVER"));
        $session = new Session($credential,getenv('URL_SERVER'));

        if($session->auth()){

            $addrolRolUser = new AddUserToRoleRequestDOM("furiosojack2","CORPORATE",$session->getAuthResponseDOM()->getSessionID());

            $response = $session->request($addrolRolUser);

            $this->assertTrue($response->isSuccess());
        }

    }

    public function testGetRoles()
    {
        $credential = new Credentials(getenv("USERNAME_SERVER"),getenv("PASSWORD_SERVER"));
        $session = new Session($credential,getenv('URL_SERVER'));

        if($session->auth()){

            $getRoles = new GetRolesRequest($session->getAuthResponseDOM()->getSessionID());

            $response = $session->request($getRoles);

            $this->assertTrue($response->isSuccess());
        }

    }




}