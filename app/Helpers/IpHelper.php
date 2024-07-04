<?php
namespace App\Helpers;

class IpHelper
{
    public static function getUserCountry()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $apiUrl = "http://ip-api.com/json/{$ip}";

        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        if ($data && $data['status'] == 'success') {
            return $data['country'];
        } else {
            return 'Unknown';
        }
    }
}

?>
