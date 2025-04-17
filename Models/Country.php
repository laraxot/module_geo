<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];

    public function regions()
    {
        return $this->hasMany(Region::class, 'country', 'name');
    }

    public function provinces()
    {
        return $this->hasMany(Province::class, 'country', 'name');
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'country_name', 'name');
    }
}
