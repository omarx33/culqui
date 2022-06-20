<?php 

/* require 'vendor/autoload.php';

 */

include_once dirname(__FILE__).'/librerias/Requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'/librerias/culqi-php/lib/culqi.php';

// Configurar tu API Key y autenticación
$SECRET_KEY ='sk_test_02073ad2cd63368c';
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));




$charge = $culqi->Charges->create(
 array(
     "amount" => $_REQUEST['precio'],
     "currency_code" => "PEN",
     "description" =>'Venta de '.$_REQUEST['producto'],
     "email" =>  $_REQUEST['email'],
     "source_id" => $_REQUEST['token']
   )
);

echo "exitoso";

?>