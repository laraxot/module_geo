<?php

namespace Modules\Geo\Models\Traits;

use Illuminate\Support\Str;
//--- models ---
use Modules\Blog\Models\Place;
//---- services --
use Modules\Geo\Services\GeoService;

trait GeoTrait {
    public function getFillable() {
        $shorts = collect(Place::$address_components)->map(
            function ($item) {
                return $item.'_short';
            }
        )->all();
        $fillable = array_merge($this->fillable, Place::$address_components, $shorts, ['latitude', 'longitude']);

        return $fillable;
    }

    //---- Scopes ----
    public function scopeWithDistance($query, $lat, $lng) {
        $q = $query;
        if (0 != $lat && 0 != $lng) {
            $haversine = GeoService::haversine($lat, $lng);

            return $query->selectRaw("*,{$haversine} AS distance")
                ->orderBy('distance');
        }

        return $q;
    }

    //---- mutators ----
    public function getAddress() {
        if ('' == $this->country) {
            $this->country = 'Italia';
        }

        return $this->route.', '.$this->street_number.', '.$this->locality.', '.$this->administrative_area_level_2.', '.$this->country;
    }

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

        return json_encode($val1, true);
        //return response()->json($val1);
    }

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
                $value = $before.$str.''.$postal_code.', '.$after;

                return $value;
            }
            if (isset($administrative_area_level_3)) {
                $str = ', '.$administrative_area_level_3;
                $before = Str::before($value, $str);
                $after = Str::after($value, $str);
                $value = $before.', '.$postal_code.''.$str.''.$after;

                return $value;
            }
            /*
            $tmp=[];
            $tmp[]=$route;
            $tmp[]=$street_number;
            $tmp[]=$postal_code;
            $tmp[]=$administrative_area_level_3;
            $tmp[]=$administrative_area_level_2_short;
            $value= implode(', ', $tmp);
            return $value;
            */
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
