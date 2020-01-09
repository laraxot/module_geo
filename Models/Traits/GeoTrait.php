<?php

namespace Modules\Geo\Models\Traits;

//---- services --
use Modules\Geo\Services\GeoService;


trait GeoTrait{


	public function scopeWithDistance($query,$lat,$lng){
		$q = $query;
		if($lat != 0 && $lng != 0){
			$haversine=GeoService::haversine($lat,$lng);
			return $query->selectRaw("*,{$haversine} AS distance")
						->orderBy('distance')
						;
		}
		return $q;
	}
}