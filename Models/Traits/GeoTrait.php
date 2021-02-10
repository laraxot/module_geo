<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

use Illuminate\Support\Str;
//--- models ---
use Modules\Blog\Models\Place;
//---- services --
use Modules\Geo\Services\GeoService;

/**
 * Modules\Geo\Models\Traits\GeoTrait.
 *
 * @property float  $latitude
 * @property float  $longitude
 * @property string $country.
 * @property string $country.
 * @property string $administrative_area_level_2.
 * @property string $country.
 * @property string $locality.
 * @property string $route.
 * @property string $street_number.
 * @property string $country.
 * @property string $country.
 * @property string $administrative_area_level_2.
 * @property string $country.
 * @property string $locality.
 * @property string $route.
 * @property string $street_number.
 * @property string $route.
 * @property string $street_number.
 * @property string $postal_code.
 * @property string $administrative_area_level_3.
 * @property string $administrative_area_level_2_short.
 */
trait GeoTrait {
    /**
     * @return array
     */
    public function getFillable() {
        $shorts = collect(Place::$address_components)->map(
            function ($item) {
                return $item.'_short';
            }
        )->all();
        $fillable = array_merge($this->fillable, Place::$address_components, $shorts, ['latitude', 'longitude']);

        return $fillable;
    }

    //--- functions ----

    public function distance(?float $lat = null, ?float $lng = null): float {
        return GeoService::distance((float) $this->latitude, (float) $this->longitude, $lat, $lng, '');
    }

    //---- Scopes ----

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithDistance($query, float $lat, float $lng) {
        $q = $query;
        if (0 != $lat && 0 != $lng) {
            $haversine = GeoService::haversine($lat, $lng);

            return $query->selectRaw("*,{$haversine} AS distance")
                ->orderBy('distance');
        }

        return $q;
    }

    //---- mutators ----

    /**
     * @return string
     */
    public function getAddress() {
        if ('' == $this->country) {
            $this->country = 'Italia';
        }

        return $this->route.', '.$this->street_number.', '.$this->locality.', '.$this->administrative_area_level_2.', '.$this->country;
    }

    /**
     * @param mixed $value
     *
     * @return bool|mixed|string
     */
    public function getAddressAttribute($value) {
        if ('' != $value) {
            return json_decode($value);
        }

        if ('' == $this->country) {
            $this->country = 'Italia';
        }
        $val1 = (object) [
            'value' => $this->route.', '.$this->street_number.', '.$this->locality.', '.$this->administrative_area_level_2.', '.$this->country,
        ];
        $val1->latlng = (object) [
            'lat' => $this->latitude,
            'lng' => $this->longitude,
        ];
        foreach (Place::$address_components as $v) {
            $val1->$v = $this->$v;
            $val1->{$v.'_short'} = $this->{$v.'_short'};
        }

        return json_encode($val1, 1);
        //return response()->json($val1);
    }

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function getFullAddressAttribute($value) {
        if (isJson($this->address)) {
            $addr = json_decode($this->address);
            if (is_object($addr)) {
                $addr = get_object_vars($addr);
            }

            extract($addr);

            $value = str_ireplace(', Italia', '', $value);
            if (isset($street_number)) {
                $str = $street_number.', ';
                $before = Str::before($value, $str);
                $after = Str::after($value, $str);
                $value = $before.$str.''.($postal_code ?? '').', '.$after;

                return $value;
            }
            if (isset($administrative_area_level_3)) {
                $str = ', '.$administrative_area_level_3;
                $before = Str::before($value, $str);
                $after = Str::after($value, $str);
                $value = $before.', '.($postal_code ?? '').''.$str.''.$after;

                return $value;
            }
        }
        if (is_object($this->address)) {
            $address = collect($this->address)->except(['value', 'latlng']);
            $up = false;
            foreach ($address->all() as $k => $v) {
                if ($this->$k != $v) {
                    $up = true;
                    break;
                }
            }
            if ($up) {
                $this->update($address->all());
            }

            $tmp = [];
            $tmp[] = $address->get('route');
            $tmp[] = $address->get('street_number');
            $tmp[] = $address->get('postal_code');
            $tmp[] = $address->get('administrative_area_level_3');
            $tmp[] = $address->get('administrative_area_level_2_short');
            $value = implode(', ', $tmp);

            return $value;
        }

        $tmp = [];
        $tmp[] = $this->route;
        $tmp[] = $this->street_number;
        $tmp[] = $this->postal_code;
        $tmp[] = $this->administrative_area_level_3;
        $tmp[] = $this->administrative_area_level_2_short;
        $value = implode(', ', $tmp);

        return $value;
    }
}
