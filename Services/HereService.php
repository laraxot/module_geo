<?php

declare(strict_types=1);

namespace Modules\Geo\Services;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
use Illuminate\Support\Facades\Http;
use Modules\Tenant\Services\TenantService;

class HereService {
    public string $base_url = 'https://router.hereapi.com/v8/routes';

<<<<<<< HEAD
    //https://router.hereapi.com/v8/routes?transportMode=car&origin=52.5308,13.3847&destination=52.5323,13.3789&return=summary
=======
    // https://router.hereapi.com/v8/routes?transportMode=car&origin=52.5308,13.3847&destination=52.5323,13.3789&return=summary
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

    public static function getDurationAndLength(float $lat1, float $lon1, float $lat2, float $lon2): ?array {
        $api_key = TenantService::config('services.here.api_key');

        $data = [
            'transportMode' => 'car',
            'origin' => $lat1.','.$lon1,
            'destination' => $lat2.','.$lon2,
            'return' => 'summary',
            'apiKey' => $api_key,
        ];

<<<<<<< HEAD
        //dddx(TenantService::config('services.here'));
=======
        // dddx(TenantService::config('services.here'));
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

        $base_url = 'https://router.hereapi.com/v8/routes';
        $response = Http::get($base_url, $data);

        $json = $response->json();
<<<<<<< HEAD
=======
        if (! \is_array($json)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
        if (! isset($json['routes'])) {
            dddx($json);

            return null;
        }

        if (! isset($json['routes'][0])) {
            return null;
        }

        $summary = $json['routes'][0]['sections']['0']['summary'];
<<<<<<< HEAD
        //dddx(['A' => $lat1.','.$lon1, 'B' => $lat2.','.$lon2, 'summary' => $summary]);
=======
        // dddx(['A' => $lat1.','.$lon1, 'B' => $lat2.','.$lon2, 'summary' => $summary]);
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
        /*
         "duration" => 0
        "length" => 0
      */
        return $summary;
    }
}
