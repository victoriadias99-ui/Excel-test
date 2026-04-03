<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("../n-includes/conexionFacebook.php");
include("../n-includes/class.autonum.php");
require './vendor/autoload.php';

use FacebookAds\Object\AdAccount;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;

$access_token = 'EAAGBPcWukfsBAF5duNEbUmaXBM4ps3T6CMtOZBdK6zPvcxxVfg10vFrewM2AZAk2TDzvMyeij8iuk2pR2ww6bZBFXmj1pQVOYERliSW7ZCnvxXa28Ij0sGgjr1hFikQwSQacwXTE0YclSlaAP2UQK4uq6RZBeUw3e9uEJNOTjlZAZBWlnUpBl3J';
$app_secret = '7c371a4a9de434debbe529de59f7ee24';
$app_id = '423577286251003';

$api = Api::init($app_id, $app_secret, $access_token);
$api->setLogger(new CurlLogger());

$fields = array(
    'account_id',
    'account_name',
    'campaign_id',
    'campaign_name',
    'adset_id',
    'adset_name',
    'spend',
    'clicks',
    'cpc',
    'cpm',
    'cpp',
    'ctr',
    'frequency',
    'website_purchase_roas',
    'website_ctr'
);


$arrayData = [];
$cnx = OpenCon();

$consulta = "SELECT *  FROM `facebook_conf` WHERE `key` = 'cuentas'";
$stmt = $cnx->prepare($consulta);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cuentas = explode('|', $rows[0]['value']);
$dias = 1;
$respuesta = [];
foreach ($cuentas  as $cuenta) {
    $fechaInicio = date("Y-m-d", strtotime(date('Y-m-d') . "- $dias days"));
    for ($j = 1; $j <= $dias + 1; $j++) {
        $params = array(
            'time_range' => array('since' => $fechaInicio, 'until' => $fechaInicio),
            'filtering' => array(),
            'level' => 'adset',
        );


        $result = ((new AdAccount('act_' . $cuenta))->getInsights($fields, $params)->getResponse()->getContent());
        foreach ($result['data'] as $r) {
            $consulta = "SELECT count(id) as c  FROM `facebook_camp` WHERE `fecha` = '" . $fechaInicio . "' AND `adset_id` = '" . $r['adset_id'] . "';";
            $stmt = $cnx->prepare($consulta);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($rows[0]['c'] == 0) {
                $consulta = "INSERT INTO `facebook_camp`(`account_id`, `account_name`, `adset_id`, `adset_name`,`campaign_id`, `campaign_name`, `spend`, `clicks`, `cpc`, `cpm`, `cpp`, `ctr`, `frequency`, `website_purchase_roas`, `website_ctr`, `fecha`) "
                        . "VALUES ('" . $r['account_id'] . "','" . $r['account_name'] . "','" . $r['adset_id'] . "','" . $r['adset_name'] . "','" . $r['campaign_id'] . "','" . $r['campaign_name'] . "','" . $r['spend'] . "','" . $r['clicks'] . "','" . $r['cpc'] . "','" . $r['cpm'] . "','" . $r['cpp'] . "','" . $r['ctr'] . "','" . $r['frequency'] . "','" . $r['website_purchase_roas'][0]['value'] . "','" . $r['website_ctr'][0]['value'] . "','" . $fechaInicio . "')";
                $stmt = $cnx->prepare($consulta);
                $stmt->execute();
            } else {
                $consulta = "UPDATE `facebook_camp` SET "
                        . "`account_id`='" . $r['account_id'] . "',"
                        . "`account_name`='" . strtoupper($r['account_name']) . "',"
                        . "`adset_id`='" . $r['adset_id'] . "',"
                        . "`adset_name`='" . strtoupper($r['adset_name']) . "',"
                        . "`campaign_id`='" . $r['campaign_id'] . "',"
                        . "`campaign_name`='" . strtoupper($r['campaign_name']) . "',"
                        . "`spend`='" . $r['spend'] . "',"
                        . "`clicks`='" . $r['clicks'] . "',"
                        . "`cpc`='" . (isset($r['cpc']) ? $r['cpc'] : 0) . "',"
                        . "`cpm`='" . (isset($r['cpc']) ? $r['cpm'] : 0) . "',"
                        . "`cpp`='" . (isset($r['cpc']) ? $r['cpp'] : 0) . "',"
                        . "`ctr`='" . (isset($r['cpc']) ? $r['ctr'] : 0) . "',"
                        . "`frequency`='" . $r['frequency'] . "',"
                        . "`website_purchase_roas`='" . (isset($r['website_purchase_roas']) ?$r['website_purchase_roas'][0]['value']:'' ) . "',"
                        . "`website_ctr`='" . (isset($r['website_ctr'][0]['value']) ? $r['website_ctr'][0]['value'] : 0) . "'"
                        . "WHERE fecha = '" . $fechaInicio . "' and `adset_id` = '" . $r['adset_id'] . "';";
                $stmt = $cnx->prepare($consulta);
                $stmt->execute();
            }
            $respuesta[] = $r;
        }

        $date = new DateTime($fechaInicio);
        $date->modify('+1 day');
        $fechaInicio = $date->format('Y-m-d');
    }
}

return $respuesta;
