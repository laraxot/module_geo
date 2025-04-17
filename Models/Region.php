<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name', 'country',
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class, 'region', 'name');
    }
}
