<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
<<<<<<< HEAD
////use Laravel\Scout\Searchable;
=======
// //use Laravel\Scout\Searchable;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
use Modules\Xot\Traits\Updater;

/**
 * Class BasePivot.
 */
abstract class BasePivot extends Pivot {
    use Updater;
<<<<<<< HEAD
    //use Searchable;
=======
    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    protected $perPage = 30;

    // use Searchable;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

    /**
     * @var string
     */
    protected $connection = 'geo'; // this will use the specified database conneciton
    /**
     * @var array
     */
    protected $appends = [];
    /**
<<<<<<< HEAD
     * @var array
=======
     * @var array<string, string>
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
     */
    protected $casts = [];
    /**
     * @var string[]
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * Undocumented variable.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var bool
     */
    public $incrementing = true;
<<<<<<< HEAD
}
=======
}
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
