<?php
namespace FuriosoJack\KaseyaSDKSOAP\Tests\Requests;
use FuriosoJack\KaseyaSDKSOAP\Request\Request;
use FuriosoJack\KaseyaSDKSOAP\Tests\TestCase;

/**
 * Class SendTest
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class SendTest extends TestCase
{

    public function tetsSendAuth()
    {

        $url = "https://saas14.pccor.net/vsaWS/KaseyaWS.asmx";

        $request = new Request($url);
        $request->setHeaders('SOAPAction: "KaseyaWS/Authenticate"');

        $request->send("Authenticate",null);



    }

}