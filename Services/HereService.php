<?php

declare(strict_types=1);

namespace Modules\Geo\Services;

use Illuminate\Support\Facades\Http;
use Modules\Xot\Services\TenantService;

class HereService {
    public string $base_url = 'https://router.hereapi.com/v8/routes';

    //https://router.hereapi.com/v8/routes?transportMode=car&origin=52.5308,13.3847&destination=52.5323,13.3789&return=summary

    public static function getDurationAndLength(float $lat1, float $lon1, float $lat2, float $lon2) {

        $api_key=TenantService::config('services.here.api_key');


        $data = [
            'transportMode' => 'car',
            'origin' => $lat1.','.$lon1,
            'destination' => $lat2.','.$lon2,
            'return' => 'summary',
            'apiKey' => $api_key,
        ];

        //dddx(TenantService::config('services.here'));

        $base_url = 'https://router.hereapi.com/v8/routes';
        $response = Http::get($base_url, $data);

        $json = $response->json();
        if (! isset($json['routes'])) {
            dddx($json);
            return null;
        }

        if (! isset($json['routes'][0])) {
           return null;
        }


        $summary = $json['routes'][0]['sections']['0']['summary'];
        //dddx(['A' => $lat1.','.$lon1, 'B' => $lat2.','.$lon2, 'summary' => $summary]);
        /*
         "duration" => 0
        "length" => 0
      */
        return $summary;
    }
}
