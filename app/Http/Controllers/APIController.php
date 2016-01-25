<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cities;
use App\Models\Directions;

class APIController extends Controller {


    public function index() {
        $data = \App\Models\Directions::with("fromCity", "toCity", "providers");

        return response()->json($data);
    }

    public function getDirections(Request $request, $from_city, $to_city) {
       
       
        $params = (object) ["from_city" => $from_city, 'to_city' => $to_city];
        $selected_directions = (new Directions())->getDirection($params);

        $directions = Directions::with(["stations", "stations.city"])->whereIn('id', $selected_directions)->get()
                ->filter(function($item) {
            return $item->stations->count() != 0;
        });
        if ($directions->count() == 0)
            return Response::HTTP_BAD_REQUEST;
        else {
            $data['directions'] = $directions;
            $data['providers'] = \App\Models\Providers::all();
            return response()->json($data);
        }
    }
    
    public function getCities()
    {
        return response()->json(Cities::all());
    }

}
