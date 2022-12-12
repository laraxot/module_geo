<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
////use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

/**
 * {.
 * 
 * item_description }
 * da fare php artisan scout:import Modules\Blog\Models\Post.
=======
// //use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

/**
 * Modules\Geo\Models\GeoNamesCap.
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
 *
 * @method static \Illuminate\Database\Eloquent\Builder|GeoNamesCap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeoNamesCap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeoNamesCap query()
<<<<<<< HEAD
 * @mixin \Eloquent
 * @mixin IdeHelperGeoNamesCap
 */
class GeoNamesCap extends Model {
    //use Searchable;
=======
 *
 * @mixin \Eloquent
 */
class GeoNamesCap extends Model {
    // use Searchable;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
    use Updater;

    /**
     * @var string
     */
    protected $table = 'geonames_cap';
<<<<<<< HEAD
    //protected $connection = 'geo';
=======
    // protected $connection = 'geo';
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

    /*
     * { function_description }
     *
     */
    /*
    function __construct(){
        $this->setConnection('liveuser_general');
        parent::__construct();
    }//end construct
    */
}
