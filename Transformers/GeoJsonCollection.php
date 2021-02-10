<?php

namespace Modules\Geo\Transformers;

/*
*  GEOJSON e' uno standard
* https://it.wikipedia.org/wiki/GeoJSON
**/

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class GeoJsonCollection
 * @package Modules\Geo\Transformers
 */
class GeoJsonCollection extends ResourceCollection {
    /**
     * @var string
     */
    public $collects = GeoJsonResource::class;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'type' => 'FeatureCollection',
            'features' => $this->collection,
            /*'links' => [
                'self' => 'link-value',
            ],*/
        ];
    }
}
