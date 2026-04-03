<?php
require_once('../vendor/autoload.php');

$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');




$apiInstance = new SendinBlue\Client\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$listId = isset($_POST['list'])?$_POST['list']:0;
$email = isset($_POST['email'])?$_POST['email']:'';
$curso = isset($_POST['curso'])?$_POST['curso']:'';
$pais = isset($_POST['pais'])?$_POST['pais']:'';
$firstname = isset($_POST['nombre'])?$_POST['nombre']:'';
$lastname = isset($_POST['appellido'])?$_POST['apellido']:'';
$sms = isset($_POST['telefono'])?$_POST['telefono']:'';
$moneda = isset($_POST['moneda'])?$_POST['moneda']:'';
$creacion = date('Y-m-d');
var_dump($email);
  // int | Id of the list
$contactEmails = new \SendinBlue\Client\Model\AddContactToList(); // \SendinBlue\Client\Model\AddContactToList | Emails addresses OR IDs of the contacts
$createContact = new \SendinBlue\Client\Model\CreateContact(); // \SendinBlue\Client\Model\CreateContact | Values to create a contact
$att = array();
$atr['LASTNAME'] = $lastname;
$atr['FIRSTNAME'] = $lastname;
$atr['SMS'] = $sms;
$atr['FECHA_CREACION'] = $creacion;
$atr['MONEDA'] = $moneda;
$atr['PAIS'] = $pais;
$atr['CURSO'] = $curso;

$createContact['email'] = $email;
$createContact['attributes'] = $atr;
try {
    $result = $apiInstance->createContact($createContact);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->createContact: ', $e->getMessage(), PHP_EOL;
}

$contactEmails['emails'] = array($email);
try {
    $result = $apiInstance->addContactToList($listId, $contactEmails);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->addContactToList: ', $e->getMessage(), PHP_EOL;
}
?>
