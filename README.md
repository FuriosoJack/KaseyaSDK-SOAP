## Bienvenido a KaseyaSDK para PHP


Con este repositorio puedes hacer peticiones al webservice de Kaseya. Que se encuentra en todos lo servidores con la ruta `https://127.0.0.1/vsaWS/KaseyaWS.asmx`

### Instalacion

Para hacer la instalacion con 

`composer require furiosojack/kaseya-sdk-soap`

### Uso

Lo primero es crear un objeto credential, el cual recibe como parametros en el contructuro el usuario y el password.

```php

$username = "test";
$password = "123456";
$credentials = FuriosoJack\KaseyaSDKSOAP\HTTP\Auth\Credentials($username, $password);
```

Lo siguiente seria crear la sesicion que se encarga de autenticarse y guardar el sessionID que se necesitara para todas la peticiones.


```php

$hostServer = "127.0.0.1";
$session = new FuriosoJack\KaseyaSDKSOAP\HTTP\Session($credentials,$hostServer);
if($session->auth()){
    //Esta autenticado
     
}else{
    //No se autentico            
}
```

Las peticiones que puede realizar con este paquete por ahora son las siguientes
- AddOrg
- AddOrgToScope
- AddScope
- AddUserToRole
- AddUserToScope
- CreateAdmin
- GetOrgs

Ahora para ejecutar alguna de estas peticiones debe saber que cada una de ella tiene su clase que se encarga de contruir el XML.

Todas las peticiones estan en el namespace `FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\`

### Ejemplo GetOrgs

```php
    //Para botener la lista de organizaciones vasta con el siguiente codigo
    
    $username = "test";
    $password = "123456";
    $credentials = FuriosoJack\KaseyaSDKSOAP\HTTP\Auth\Credentials($username, $password);
    $hostServer = "127.0.0.1";
    $session = new FuriosoJack\KaseyaSDKSOAP\HTTP\Session($credentials,$hostServer);
    if($session->auth()){
        //Esta autenticado
         $response = $session->request(new FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Request\GetOrgsRequestDOM($session->getAuthResponseDOM()->getSessionID()));
         //DomResponse
         $domResponse = $response->getResponseDOM();
    }else{
        //No se autentico            
    }
        
```

La variable `$domResponse` declarada en el ejemplo representa aun objeto response ubicado en el namespace `FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Response` para este caso que como se llamo al `GetOrgsRequestDOM` devolveria un objeto `GetOrgsResponseDOM` del cual puede obtener la linta de organizacion por medio del metodo getOrgs() y el cual devuelve un array de Objectos `FuriosoJack\KaseyaSDKSOAP\HTTP\DOM\Elements\Org`


