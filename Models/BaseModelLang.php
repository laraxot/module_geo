<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
<<<<<<< HEAD
////use Laravel\Scout\Searchable;
=======
// //use Laravel\Scout\Searchable;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

use Illuminate\Database\Eloquent\Model;
use Modules\Lang\Models\Traits\LinkedTrait;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModelLang.
<<<<<<< HEAD
 */
abstract class BaseModelLang extends Model {
    use Updater;
    //use Searchable;
    use LinkedTrait;
    use HasFactory;
=======
 *
 * @property string|null $post_type
 */
abstract class BaseModelLang extends Model {
    use HasFactory;
    // use Searchable;
    use LinkedTrait;
    use Updater;
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
     * @var string[]
     */
    protected $fillable = ['id'];

    /**
<<<<<<< HEAD
     * @var array
     */
    protected $casts = [
        //'published_at' => 'datetime:Y-m-d', // da verificare
=======
     * @var array<string, string>
     */
    protected $casts = [
        // 'published_at' => 'datetime:Y-m-d', // da verificare
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
    ];

    /**
     * @var string[]
     */
    protected $dates = ['published_at', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
<<<<<<< HEAD
     * @var array
     */
    protected $hidden = [
        //'password'
=======
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password'
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

<<<<<<< HEAD
    //-----------
=======
    // -----------
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
    /*
    protected $id;
    protected $post;
    protected $lang;
    */
    protected $connection = 'geo';
}
