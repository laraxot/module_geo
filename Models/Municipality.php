<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $fillable = [
        'code',
        'name',
        'foreign_name',
        'cadastral_code',
        'postal_code',
        'prefix',
        'province_name',
        'province_abbreviation',
        'region_name',
        'country_name',
        'email',
        'certified_email',
        'phone',
        'fax',
        'latitude',
        'longitude',
    ];

    /*public function province()
    {
        return $this->belongsTo(Province::class, 'province_name', 'name');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_name', 'name');
    }*/
}
