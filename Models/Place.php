<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

//------services---------
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Geo\Database\Factories\PlaceFactory;
use Modules\Xot\Services\ImportService;

//------ models --------

/**
 * Modules\Geo\Models\Place.
 *
 * @property int                                                                      $id
 * @property string|null                                                              $post_type
 * @property int|null                                                                 $post_id
 * @property string|null                                                              $formatted_address
 * @property string|null                                                              $latitude
 * @property string|null                                                              $longitude
 * @property string|null                                                              $premise
 * @property string|null                                                              $premise_short
 * @property string|null                                                              $locality
 * @property string|null                                                              $locality_short
 * @property string|null                                                              $postal_town
 * @property string|null                                                              $postal_town_short
 * @property string|null                                                              $administrative_area_level_3
 * @property string|null                                                              $administrative_area_level_3_short
 * @property string|null                                                              $administrative_area_level_2
 * @property string|null                                                              $administrative_area_level_2_short
 * @property string|null                                                              $administrative_area_level_1
 * @property string|null                                                              $administrative_area_level_1_short
 * @property string|null                                                              $country
 * @property string|null                                                              $country_short
 * @property string|null                                                              $street_number
 * @property string|null                                                              $street_number_short
 * @property string|null                                                              $route
 * @property string|null                                                              $route_short
 * @property string|null                                                              $postal_code
 * @property string|null                                                              $postal_code_short
 * @property string|null                                                              $googleplace_url
 * @property string|null                                                              $googleplace_url_short
 * @property string|null                                                              $point_of_interest
 * @property string|null                                                              $point_of_interest_short
 * @property string|null                                                              $political
 * @property string|null                                                              $political_short
 * @property string|null                                                              $campground
 * @property string|null                                                              $campground_short
 * @property string|null                                                              $nearest_street
 * @property string|null                                                              $created_by
 * @property string|null                                                              $updated_by
 * @property string|null                                                              $deleted_by
 * @property \Illuminate\Support\Carbon|null                                          $created_at
 * @property \Illuminate\Support\Carbon|null                                          $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\Blog\Models\Favorite[] $favorites
 * @property int|null                                                                 $favorites_count
 * @property string|null                                                              $guid
 * @property string|null                                                              $image_src
 * @property string|null                                                              $lang
 * @property string|null                                                              $subtitle
 * @property string|null                                                              $title
 * @property string|null                                                              $txt
 * @property string|null                                                              $user_handle
 * @property string                                                                   $value
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\Blog\Models\Image[]    $images
 * @property int|null                                                                 $images_count
 * @property \Illuminate\Database\Eloquent\Model|\Eloquent                            $linked
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\Blog\Models\Favorite[] $myFavorites
 * @property int|null                                                                 $my_favorites_count
 * @property \Modules\Blog\Models\Post|null                                           $post
 * @property mixed                                                                    $url
 *
 * @method static \Modules\Blog\Database\Factories\PlaceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Place newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Place newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang ofItem(string $guid)
 * @method static \Illuminate\Database\Eloquent\Builder|Place query()
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAdministrativeAreaLevel1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAdministrativeAreaLevel1Short($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAdministrativeAreaLevel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAdministrativeAreaLevel2Short($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAdministrativeAreaLevel3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereAdministrativeAreaLevel3Short($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereCampground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereCampgroundShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereCountryShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereFormattedAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereGoogleplaceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereGoogleplaceUrlShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereLocality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereLocalityShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereNearestStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePointOfInterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePointOfInterestShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePolitical($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePoliticalShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePostalCodeShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePostalTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePostalTownShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePremise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place wherePremiseShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereRouteShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereStreetNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereStreetNumberShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Place whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang withPost(string $guid)
 * @mixin \Eloquent
 */
class Place extends BaseModelLang {
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['id', 'post_id', 'post_type',
        //---- address_components----
        'premise', 'locality', 'postal_town',
        'administrative_area_level_3', 'administrative_area_level_2',  'administrative_area_level_1',
        'country',
        'street_number', 'route', 'postal_code',
        'googleplace_url',
        'point_of_interest', 'political', 'campground',
        //-----
        'latitude', 'longitude', 'formatted_address', 'nearest_street',
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
        return PlaceFactory::new();
    }

    //----- mutators -----

    /**
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
            //ddd($this->attributes);
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
}
