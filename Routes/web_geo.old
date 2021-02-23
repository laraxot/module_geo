<?php

use Modules\Xot\library\XOT;

$namespace = $this->getNamespace().'\Controllers';

$item0 = [
    'name' => 'geo', 'prefix' => 'geo', 'as' => 'geo.', 'namespace' => null, 'controller' => 'GeoController', 'only' => ['index'],
    /*
    'subs'=>[
        [
            'name'=>'post',
            'prefix'=>'post',
            'as'=>'post.',
            'namespace'=>'blog',
            'controller'=>'PostController',
        ],//end sub_n

    ],//end subs
    */
    'acts' => [
        [
            'name' => 'latlong/{lat}/{long}',
            'method' => 'any',
            'act' => 'latlong',
            'as' => 'latlong',
        ], //end act_n
    ], //end acts
];

$areas_prgs = [
    $item0,
];

Route::group(['prefix' => null, /*'middleware' => ['web','auth'],*/'namespace' => $namespace], function () use ($areas_prgs) {
    XOT::dynamic_route($areas_prgs);
});
