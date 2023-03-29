<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Database\Factories\EventFactory;
use Modules\Geo\Models\Traits\HasPlaceTrait;

// ----- models -----

/**
 * Modules\Geo\Models\Event.
 *
 * @property int $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $date_start
 * @property \Illuminate\Support\Carbon|null $date_end
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property string|null $guid
 * @property string|null $image_src
 * @property-read string|null $lang
 * @property-read string|null $post_type
 * @property string|null $subtitle
 * @property string|null $title
 * @property string|null $txt
 * @property-read string|null $user_handle
 * @property-read \Modules\Geo\Models\Place|null $place
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Geo\Models\Place> $places
 * @property-read int|null $places_count
 * @property-read \Modules\Lang\Models\Post|null $post
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lang\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-write mixed $url
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang ofItem(string $guid)
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang withPost(string $guid)
 * @mixin \Eloquent
 */
class Event extends BaseModelLang {
    use HasFactory;
    use HasPlaceTrait;

    /**
     * @var string[]
     */
    protected $fillable = ['id', 'date_start', 'date_end'/* ,'formatted_address' */];

    /**
     * @var string[]
     */
    public array $fillableRelationship = ['address'];

    /**
     * @var array
     */
    protected $appends = [/* 'formatted_address' */];

    /**
     * @var string[]
     */
    protected $dates = ['date_start', 'date_end', 'created_at', 'updated_at'];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'date_start' => 'datetime:Y-m-d\TH:i',
        'date_end' => 'datetime:Y-m-d\TH:i',
    ];

    /*
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory

    protected static function newFactory() {
        return EventFactory::new();
    }
    */

    // ----- relationship -----

    /* spostato in HasPlaceTrait
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne

    public function address() {// fare HasPlaceTrait
        $row = $this->morphOne(Place::class, 'post'); //->withDefault('aaaa')

        return $row;
    }
    */

    // ----- mutators -----

    /*
     * @param mixed $value
     */
    /*
    public function setDateStartAttribute($value): void {
        $date_format = 'd/m/Y H:i';
        if (! is_object($value)) {
            $this->attributes['date_start'] = Carbon::createFromFormat($date_format, $value);
        }
    }
    */
    /*
     * @param mixed $value
     */
    /*
    public function setDateEndAttribute($value): void {
        $date_format = 'd/m/Y H:i';
        if (! is_object($value)) {
            $this->attributes['date_end'] = Carbon::createFromFormat($date_format, $value);
        }
    }
    */
}// end model
