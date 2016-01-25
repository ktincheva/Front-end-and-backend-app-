<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Ixudra\Curl\Facades\Curl;

class HomeController extends Controller {

    private $api_url = "http://bus_stations.localhost.bg/api/";
    //
    public function index() {
        return view('web.home');
    }

    public function getData(Request $request) {
        $params = (object) Input::get();
        //$curl->addOptions(CURLOPT_VERBOSE, true);
        $data = Curl::get($this->api_url."directions/{$params->from_city}/{$params->to_city}", [], false, ['VERBOSE' => true]);
        $data = json_decode($data);
        $data = (object) $data;
        ;
        return view('web.data', compact('data'));
    }

    public function getCitiesData(Request $request) {
        $data = Curl::get($this->api_url."getcities", [], false, ['VERBOSE' => true]);
        $data = json_decode($data);
        $data = (object) $data;
        return view('web.select_cities', compact('data'));
    }

}
