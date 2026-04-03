<?php
ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;
use FacebookAds\Object\ServerSide\CustomData;
use FacebookAds\Object\ServerSide\Event;
use FacebookAds\Object\ServerSide\EventRequest;
use FacebookAds\Object\ServerSide\UserData;
require dirname(__DIR__) . '/vendor/autoload.php';

class ApiFacebookEventsFunciones {
    static function initPaymentSendDataInitPaymentFacebook($correo, $precio, $moneda, $url) {
        if (isset($_GET['test'])) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
        
        $access_token = 'EAAGf2mcgcL8BAAICqyfrditlMF1QmLP3t4J87OSPje7kJiKFtGkqu84gqUYHVZCeQuIY7gaEs19u9BFfDBLZC5n8Lw3X3PrItF7hUXFWTIzL4c230u4bhuHEZCWHHkZBxkYpfuYYxjbCJFv2HnczK1cfZBBiIx3RqUtS01oRMa3fEwHaXZAs8nBDp9ZAeICn9sZD';
        $pixel_id = '511321206686257';
        $test_id = 'none';


        if ($access_token != '' && $access_token != null) {
            Api::init(null, null, $access_token);
            $api = Api::instance();
            $api->setLogger(new CurlLogger());

            $events = array();

            if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
                $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
            } else if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $ip = explode(',', str_replace(' ', '', $ip))[0];

            $user_data = (new UserData())
                    ->setEmail(hash('sha256', $correo))
                    ->setClientIpAddress($ip)
                    ->setClientUserAgent($_SERVER['HTTP_USER_AGENT']);

            if (isset($_COOKIE['_fbc']))
                $user_data->setFbc($_COOKIE['_fbc']);
            if (isset($_COOKIE['_fbp']))
                $user_data->setFbp($_COOKIE['_fbp']);
//
//        $custom_data = (new CustomData())
//                ->setValue($precio)
//                ->setCurrency($moneda);

            $event_0 = (new Event())
                    ->setEventName('InitiateCheckout')
                    ->setEventTime(time())
                    ->setEventSourceUrl($url)
                    ->setUserData($user_data);
            //->setCustomData($custom_data);

            array_push($events, $event_0);

            if ($test_id != 'none') {
                $request = (new EventRequest($pixel_id))
                        ->setEvents($events)
                        ->setTestEventCode($test_id);
            } else {
                $request = (new EventRequest($pixel_id))
                        ->setEvents($events);
            }
            $request->execute();
        }
    }
    static function initPaymentSendDataDonePaymentFacebook($cache, $ipData, $correo, $precio, $moneda, $url) {
        if (isset($_GET['test'])) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
        
        $access_token = 'EAAGf2mcgcL8BAAICqyfrditlMF1QmLP3t4J87OSPje7kJiKFtGkqu84gqUYHVZCeQuIY7gaEs19u9BFfDBLZC5n8Lw3X3PrItF7hUXFWTIzL4c230u4bhuHEZCWHHkZBxkYpfuYYxjbCJFv2HnczK1cfZBBiIx3RqUtS01oRMa3fEwHaXZAs8nBDp9ZAeICn9sZD';
        $pixel_id = '511321206686257';
        $test_id = 'TEST28351';

        if ($access_token != '' && $access_token != null) {
            Api::init(null, null, $access_token);
            $api = Api::instance();
            $api->setLogger(new CurlLogger());

            $events = array();

            $user_data = (new UserData())
                    ->setEmail(hash('sha256', $correo))
                    ->setClientUserAgent($_SERVER['HTTP_USER_AGENT']);
            
            if ($ipData != null) {
                $user_data->setClientIpAddress($ipData->ip)
                        ->setZipCode($ipData->postal)
                        ->setCountryCode($ipData->country_code)
                        ->setCity($ipData->city);
            }


            if ($cache != null) {
                if (isset($cache->_fbc))
                    $user_data->setFbc($cache->_fbc);
                if (isset($cache->_fbp))
                    $user_data->setFbp($cache->_fbp);
            }

        $custom_data = (new CustomData())
                ->setValue($precio)
                ->setCurrency($moneda);

            $event_0 = (new Event())
                    ->setEventName('Purchase')
                    ->setEventTime(time())
                    ->setEventSourceUrl($url)
                    ->setUserData($user_data)
            ->setCustomData($custom_data);

            array_push($events, $event_0);

            if ($test_id != 'none') {
                $request = (new EventRequest($pixel_id))
                        ->setEvents($events)
                        ->setTestEventCode($test_id);
            } else {
                $request = (new EventRequest($pixel_id))
                        ->setEvents($events);
            }
            $request->execute();
        }
    }

}
?>