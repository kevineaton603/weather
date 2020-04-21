<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

class PagesController extends Controller
{
    private function weather($lat, $lon){
        $API_KEY = env('API_KEY', 'ERROR');
        $url = 'https://api.openweathermap.org/data/2.5/weather?lat='
                . $lat . '&lon=' . $lon . '&appid=' . $API_KEY;
        $client = new Client();
        $response = $client->get($url);

        return $response->getBody();
    }

    public function index(Request $request){
        $unit = $request->cookie("temp_unit");
        $location = geoip()->getLocation($ip=null);
        $weather = json_decode($this->weather($location['lat'], $location['lon']));
        $data = array(
            'weather' => $weather,
            'measurement' => $unit
        );
        $view = view('pages.index')->with($data);

        $res = new Response($view);
        
        if($unit == NULL){
            $res->withCookie(cookie("temp_unit", "C", 100000));
        }
        return $res;
    }

    public function about(){
        $data = array(
            'team' => ['Me', 'Myself', 'I']
        );
        return view('pages.about')->with($data);
    }
}
