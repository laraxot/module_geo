<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Modules\Shop\Models\Shop;

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

    //----- funzione da generalizzare
    //qui voglio tutti gli shops che hanno shop_type uguale a food/markets/ecc
    public function foods() {
        //return Shop::where('shop_type', 'food')->get();

        //return $this->morphedByMany(Video::class, 'taggable');

        //return $this->morphedToMany(Shop::class, 'aaa', 'posts', 'ccc', 'dddd', 'eeee', 'ffff', 'gggg', 'hhhh', 'iiii');

        dddx($this->place());
    }
}
