<?php

declare(strict_types=1);

namespace Modules\Geo\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Modules\Geo\Models\Municipality;
use Modules\Geo\Models\Province;
use Modules\Geo\Models\Region;

use function Safe\json_decode;

class LocationService
{
    private Client $client;
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://axqvoqvbfjpaamphztgd.functions.supabase.co/',
        ]);

        $this->fetchAndSaveRegions();
        $this->fetchAndSaveProvinces();
        $this->fetchAndSaveMunicipalities();
    }

    public function truncateTable($model)
    {
        // Verifica se il modello esiste
        if (! class_exists($model)) {
            throw new \InvalidArgumentException("Il modello $model non esiste.");
        }

        // Elimina tutti i record nella tabella associata al modello
        $model::truncate();
    }

    public function fetchAndSaveData($endpoint, $model)
    {
        $response = $this->client->get($endpoint);
        $data = json_decode($response->getBody()->getContents(), true);

        foreach ($data as $datum) {
            if (Str::endsWith($model, 'Region')) {
                $datum = ['name' => $datum, 'country' => 'Italia'];
            } elseif (Str::endsWith($model, 'Province')) {
                $datum = ['code' => $datum['codice'], 'name' => $datum['nome'], 'abbreviation' => $datum['sigla'], 'region' => $datum['regione'], 'country' => 'Italia'];
            } elseif (Str::endsWith($model, 'Municipality')) {
                $datum = [
                    'code' => $datum['codice'],
                    'name' => $datum['nome'],
                    'foreign_name' => $datum['nomeStraniero'],
                    'cadastral_code' => $datum['codiceCatastale'],
                    'postal_code' => $datum['cap'],
                    'prefix' => $datum['prefisso'],
                    'province_name' => $datum['provincia']['nome'],
                    'province_abbreviation' => Province::firstWhere('name', $datum['provincia']['nome'])->abbreviation,
                    'region_name' => $datum['provincia']['regione'],
                    'country_name' => 'Italia',
                    'email' => $datum['email'],
                    'certified_email' => $datum['pec'],
                    'phone' => $datum['telefono'],
                    'fax' => $datum['fax'],
                    'latitude' => $datum['coordinate']['lat'],
                    'longitude' => $datum['coordinate']['lng'],
                ];
            }
            $model::create($datum);
        }
    }

    public function fetchAndSaveRegions()
    {
        $this->truncateTable(Region::class);
        $this->fetchAndSaveData('regioni', Region::class);
    }

    public function fetchAndSaveProvinces()
    {
        $this->truncateTable(Province::class);
        $this->fetchAndSaveData('province', Province::class);
    }

    public function fetchAndSaveMunicipalities()
    {
        $this->truncateTable(Municipality::class);
        $this->fetchAndSaveData('comuni', Municipality::class);
    }
}
