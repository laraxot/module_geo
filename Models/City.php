<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

//--------- models --------

//--- services

/**
 * Modules\Geo\Models\City.
 */
class City extends BaseModelLang {
    /**
     * @var string[]
     */
    protected $fillable = ['id'];

    //---------- RELATIONSHIPS -----------
    public function place() {
        return $this->morphOne(Place::class, 'post');
    }

    public function places() {
        return $this->morphMany(Place::class, 'post');
    }
}
