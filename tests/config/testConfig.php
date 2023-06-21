<?php

/**
 * This file is part of the GeocoderLaravel library.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Geocoder\Provider\BingMaps\BingMaps;
use Geocoder\Provider\Chain\Chain;
use Geocoder\Provider\GeoIP2\GeoIP2;
use Geocoder\Provider\GeoPlugin\GeoPlugin;
// use Geocoder\Provider\GoogleMaps\GoogleMaps;
use GeoIp2\Database\Reader;
use Http\Client\Curl\Client;

return [
    'cache' => [
        'store' => null,
        'duration' => 999999999,
    ],
    'providers' => [
        Chain::class => [
            GeoIP2::class => [],
            // GoogleMaps::class => [
            //     'en-US',
            //     env('GOOGLE_MAPS_API_KEY'),
            // ],
            GeoPlugin::class  => [],
        ],
        BingMaps::class => [
            'en-US',
            env('BING_MAPS_API_KEY'),
        ],
        // GoogleMaps::class => [
        //     'us',
        //     env('GOOGLE_MAPS_API_KEY'),
        // ],
    ],
    'adapter'  => Client::class,
    // 'reader' => new Reader(__DIR__ . '/../resources/assets/GeoLite2-City.mmdb'),
    "reader" => [
        Reader::class => [
            __DIR__ . '/../resources/assets/GeoLite2-City.mmdb',
        ],
    ],
];
