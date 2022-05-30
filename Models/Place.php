<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

// ------services---------
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Geo\Database\Factories\PlaceFactory;
//use Modules\Xot\Services\ImportService;

class Place extends BaseModelLang {
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['id', 'post_id', 'post_type',
        // ---- address_components----
        'premise', 'locality', 'postal_town',
        'administrative_area_level_3', 'administrative_area_level_2',  'administrative_area_level_1',
        'country',
        'street_number', 'route', 'postal_code',
        'googleplace_url',
        'point_of_interest', 'political', 'campground',
        // -----
        'latitude', 'longitude', 'formatted_address', 'nearest_street', 'address',
    ];

    /**
     * @var string[]
     */
    public static array $address_components = [
        'premise', 'locality', 'postal_town',
        'administrative_area_level_3', 'administrative_area_level_2',  'administrative_area_level_1',
        'country',
        'street_number', 'route', 'postal_code',
        'googleplace_url',
        'point_of_interest', 'political', 'campground',
    ];

    /**
     * @var string[]
     */
    protected $appends = ['value'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory() {
        return \Modules\Geo\Database\Factories\PlaceFactory::new();
    }

    // ----- mutators -----

    /**
     * @param mixed $value
     *
     * @throws \Exception
     */
    /*
    public function setFormattedAddressAttribute(string $value): void {
        if (isset($this->attributes['formatted_address'])) {
            $address = $this->attributes['formatted_address'];
        } else {
            $address = $value;
            $this->attributes['formatted_address'] = $value;
        }
        if ('' != $address) {
            $tmp = ImportService::getAddressFields(['address' => $address]);
            if (! is_array($tmp)) {
                throw new Exception('tmp is not an array');
            }
            $this->attributes = array_merge($this->attributes, $tmp);
            //dddx($this->attributes);
        }
    }
    */

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function getValueAttribute($value) {
        return $this->route.', '.$this->street_number.', '.$this->locality.', '.$this->administrative_area_level_2.', '.$this->country;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function linked() {
        return $this->morphTo('post');
    }

    /**
     * Undocumented function.
     *
     * @param mixed $value
     */
    public function setAddressAttribute($value): void {
        if (isJson($value)) {
            $json = (array) json_decode($value);
            $json['latitude'] = $json['latlng']->lat;
            $json['longitude'] = $json['latlng']->lng;
            unset($json['latlng'], $json['value']);

            $this->attributes = array_merge($this->attributes, $json);
            // dddx($this->attributes);
        }
        if (\is_array($value)) {
            $value = json_encode($value);
        }
        $this->attributes['address'] = $value;
        // dddx(['isJson'=>\isJson($value),'value'=>$value]);
    }
}