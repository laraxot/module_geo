<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

use Illuminate\Support\Str;
//--- models ---
use Modules\Geo\Models\Place;
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

    public function distance(?float $lat = null, ?float $lng = null): ?float {
        return (float) GeoService::distance((float) $this->latitude, (float) $this->longitude, $lat, $lng, '');
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

    public function getAddress(): string {
        if ('' == $this->country) {
            $this->country = 'Italia';
        }

        return $this->route.', '.$this->street_number.', '.$this->locality.', '.$this->administrative_area_level_2.', '.$this->country;
    }

    public function getLatitudeAttribute(?float $value): ?float {
        if (null !== $value) {
            return $value;
        }
        $address = $this->address;
        if (null === $address) {
            return null;
        }
        if (isJson($address)) {
            $json = json_decode($address, true);
            $lat = $json['latlng']['lat'];
            $lng = $json['latlng']['lng'];
            $this->update([
                'latitude' => $lat,
                'longitude' => $lng,
            ]);
            $this->save();

            return $lat;
        }
        if (is_object($address)) {
            dddx($address);
        }
        if (is_array($address)) {
            $lat = $address['latlng']['lat'];
            $lng = $address['latlng']['lng'];
            $this->update([
                'latitude' => $lat,
                'longitude' => $lng,
            ]);
            $this->save();

            return $lat;
        }

        return null;
    }

    /**
     * Undocumented function.
     *
     * @param mixed $value
     */
    public function setAddressAttribute($value): void {
        //*

        if (isJson($value)) {
            $json = json_decode($value, true);
            $json['latitude'] = $json['latlng']['lat'];
            $json['longitude'] = $json['latlng']['lng'];

            unset($json['latlng'], $json['value']);
            $this->attributes = array_merge($this->attributes, $json);
            if (', , , , ' == $this->attributes['full_address']) {
                $address = collect($json);
                $tmp = [];
                $tmp[] = $address->get('route');
                $tmp[] = $address->get('street_number');
                $tmp[] = $address->get('postal_code');
                $tmp[] = $address->get('administrative_area_level_3');
                $tmp[] = $address->get('administrative_area_level_2_short');

                $this->attributes['full_address'] = implode(', ', $tmp);
            }
        }

        if (is_array($value)) {
            $value = json_encode($value);
        }
        $this->attributes['address'] = $value;
        //dddx(['isJson'=>\isJson($value),'value'=>$value]);
    }

    /**
     * @param mixed $value
     *
     * @return bool|mixed|string
     */
    /*
    public function getAddressAttribute($value) {
        if (null !== $value) {
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
    */

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
            if (is_array($value)) {
                $value = implode(' ', $value);
            }
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
