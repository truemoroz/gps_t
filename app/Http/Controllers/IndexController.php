<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function getGraphData()
    {
        $data = DB::table('geo')->select('dt', 'value')->get();
        // $data = DB::table('geo')->select('dt', 'value')->whereRaw('hour(dt) = 14')->get();
        return $data;
    }

    public function getGap()
    {
        return DB::select('CALL value_gap()');
    }

    public function getAllDistance()
    {
        $values = DB::table('geo')->select('lat', 'lon')->get();

        $lat1 = (float)$values[0]->lat;
        $lon1 = (float)$values[0]->lon;
        unset($values[0]);
        $distance = 0;

        foreach ($values as $value) {
            $distance += $this->distance($lat1, $lon1, (float)$value->lat, (float)$value->lon, 'K');
            $lat1 = (float)$value->lat;
            $lon1 = (float)$value->lon;

        }
        // var_dump($data);
        return round($distance, 3);
    }

    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }
}
