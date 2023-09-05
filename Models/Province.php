<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'code',
        'name',
        'abbreviation',
        'region',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region', 'name');
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'province_name', 'name');
    }
}
