<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name',
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class, 'region', 'name');
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'region_name', 'name');
    }
}
