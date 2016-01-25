<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Directions extends Model {

    public function providers() {
        return $this->hasOne('App\Models\Providers', 'id', 'providerid');
    }

    public function getDirection($params = null) {
        $directions =[];
        $result = DB::select('SELECT todir.directionid FROM
                                    ((SELECT * FROM stations where cityid = ' . $params->from_city . ') as fromdir 
                                        LEFT JOIN
                                    (SELECT * FROM stations where cityid = ' . $params->to_city . ') as todir
                                    ON fromdir.directionid = todir.directionid) 
                                    LEFT JOIN cities c1 ON todir.cityid = c1.id
                            
                                    WHERE todir.directionid IS NOT NULL   
                                    ORDER BY todir.directionid ASC');
        foreach ($result as $direction) {
            array_push( $directions,$direction->directionid);
        }
        return $directions;
    }

    public function stations() {
        return $this->hasMany('App\Models\Stations', 'directionid', 'id');
    }

}
