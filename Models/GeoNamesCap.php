<?php



namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Extend\Traits\Updater;

/**
 * { item_description }
 * da fare php artisan scout:import Modules\Blog\Models\Post.
 */
class GeoNamesCap extends Model
{
    use Searchable;
    use Updater;
    protected $table = 'geonames_cap';
    protected $connection = 'liveuser_general';

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
