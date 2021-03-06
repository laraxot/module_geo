<?php

declare(strict_types=1);

namespace Modules\Geo\Services;

//https://www.geodatasource.com/world-cities-database/free
//https://mikepolatoglou.com/geospatial-mysql-laravel-53
//https://github.com/malhal/Laravel-Geographical
//https://www.scribd.com/presentation/2569355/Geo-Distance-Search-with-MySQL
//https://www.databasejournal.com/features/mysql/mysql-calculating-distance-based-on-latitude-and-longitude.html
//http://blog.canispater.com/2017/05/laravel-5-distance-spatial-query-part-2/
//https://scotch.io/tutorials/achieving-geo-search-with-laravel-scout-and-algolia

/**
 * Class GeoService.
 */
class GeoService {
    /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
    /*::                                                                         :*/
    /*::  This routine calculates the distance between two points (given the     :*/
    /*::  latitude/longitude of those points). It is being used to calculate     :*/
    /*::  the distance between two locations using GeoDataSource(TM) Products    :*/
    /*::                                                                         :*/
    /*::  Definitions:                                                           :*/
    /*::    South latitudes are negative, east longitudes are positive           :*/
    /*::                                                                         :*/
    /*::  Passed to function:                                                    :*/
    /*::    lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)  :*/
    /*::    lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)  :*/
    /*::    unit = the unit you desire for results                               :*/
    /*::           where: 'M' is statute miles (default)                         :*/
    /*::                  'K' is kilometers                                      :*/
    /*::                  'N' is nautical miles                                  :*/
    /*::  Worldwide cities and other features databases with latitude longitude  :*/
    /*::  are available at https://www.geodatasource.com                          :*/
    /*::                                                                         :*/
    /*::  For enquiries, please contact sales@geodatasource.com                  :*/
    /*::                                                                         :*/
    /*::  Official Web site: https://www.geodatasource.com                        :*/
    /*::                                                                         :*/
    /*::         GeoDataSource.com (C) All Rights Reserved 2018                  :*/
    /*::                                                                         :*/
    /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

    public static function distance(?float $lat1, ?float $lon1, ?float $lat2, ?float $lon2, ?string $unit): ?float {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        if(is_null($lat1)){
            return null;
        }
        if(is_null($lon1)){
            return null;
        }
        if(is_null($lat2)){
            return null;
        }
        if(is_null($lon2)){
            return null;
        }
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        switch ($unit) {
            case 'K':return $miles * 1.609344;
            case 'N':return $miles * 0.8684;
        }

        return $miles;
    }

    //echo GeoService::distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
    //echo GeoService::distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
    //echo GeoService::distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";

    /**
     * @param float $latitude
     * @param float $longitude
     *
     * @return string
     */
    public static function haversine($latitude, $longitude) {
        return '(6371 * acos(cos(radians('.$latitude.'))
        * cos(radians(`latitude`))
        * cos(radians(`longitude`)
        - radians('.$longitude.'))
        + sin(radians('.$latitude.'))
        * sin(radians(`latitude`)))) *1.1515';
    }
}
