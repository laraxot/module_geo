<?php

namespace Modules\Geo\Transformers;

/*
*  GEOJSON e' uno standard
* https://it.wikipedia.org/wiki/GeoJSON
**/

//use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class GeoJsonResource extends JsonResource {
    public function toArray($request) {
        $lang = \App::getLocale();

        return [
            'type' => 'Feature',
            'properties' => [
                'p' => $this->post_type,
                'id' => $this->post_id,
                'url' => '/'.$lang.'/'.$this->post_type.'/'.$this->guid,
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [round($this->longitude, 7), round($this->latitude, 7)],
            ],
        ];
    }
}

/*
{"type":"Feature","properties":{"p":"vending_machine","id":"node/31605830"},"geometry":{"type":"Point","coordinates":[9.0796524,48.5308688]
*/
