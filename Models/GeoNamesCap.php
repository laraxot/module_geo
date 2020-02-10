<?php

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

/**
 * {.
 item_description }
 * da fare php artisan scout:import Modules\Blog\Models\Post.
 */
class GeoNamesCap extends Model {
    use Searchable;
    use Updater;
    protected $table = 'geonames_cap';
    //protected $connection = 'geo';

    /*
     * { function_description }
     */
    /*
    function __construct(){
        $this->setConnection('liveuser_general');
        parent::__construct();
    }//end construct
    */
}
