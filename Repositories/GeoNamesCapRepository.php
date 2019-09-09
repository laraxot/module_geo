<?php

namespace Modules\Geo\Repositories;

//---base
use Modules\Xot\Repositories\XotBaseRepository;

class GeoNamesCapRepository extends XotBaseRepository {
    /**
     * Specify Model class name.
     *
     * @return string
     */
    protected $model = 'Modules\Geo\Models\GeoNamesCap';
}
