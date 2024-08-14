<?php
namespace App\Helpers;
use Jenssegers\Agent\Agent;

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

if (!function_exists('getDeviceAndOSInfo')) {
    /**
     * Get device type and OS information based on user agent.
     *
     * @param string $userAgent
     * @return array
     */
    function getDeviceAndOSInfo($userAgent)
    {
        $agent = new Agent();
        $agent->setUserAgent($userAgent);

        // Determine the device type
        if ($agent->isMobile()) {
            $deviceType = 'Mobile';
        } elseif ($agent->isTablet()) {
            $deviceType = 'Tablet';
        } elseif ($agent->isDesktop()) {
            $deviceType = 'Desktop';
        } else {
            $deviceType = 'Unknown';
        }

        // Determine the operating system
        $os = $agent->platform(); // This will return the name of the OS
        $osVersion = $agent->version($os);

        return [
            'deviceType' => $deviceType,
            'os' => $os,
            'osVersion' => $osVersion
        ];
    }
}

?>
