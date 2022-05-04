<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

use Modules\Geo\Models\Place;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Modules\Geo\Models\Traits\HasPlaceTrait.
 */
trait HasPlaceTrait {
    //----- relationship -----

    public function address(): MorphOne {
        $row = $this->morphOne(Place::class, 'post');

        return $row;
    }
}
