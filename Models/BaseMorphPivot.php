<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseMorphPivot.
 */
abstract class BaseMorphPivot extends MorphPivot {
    use Updater;
<<<<<<< HEAD
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
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

    /**
     * @var array
     */
    protected $appends = [];
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var bool
     */
    public $incrementing = true;
    /**
     * @var bool
     */
    public $timestamps = true;
<<<<<<< HEAD
    //protected $attributes = ['related_type' => 'cuisine_cat'];
=======
    // protected $attributes = ['related_type' => 'cuisine_cat'];
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        // 'published_at',
    ];
    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'post_id', 'post_type',
        'related_type',
        'user_id',
        'note',
    ];
    protected $connection = 'geo';
<<<<<<< HEAD
}
=======
}
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
