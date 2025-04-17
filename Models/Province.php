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
        'country',
    ];

    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'province_abbreviation', 'abbreviation');
    }
}
