<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherForecastController extends Controller
{
    public function index(Request $request)
    {
        $city = $request->query('city');

        $endpoint = env('OPENWEATHER_FORECAST_ENDPOINT') . '?q=' . $city 
        . '&appid=' . env('OPENWEATHER_APPID') . '&units=imperial';        

        $httpClient = new \GuzzleHttp\Client();
        $request = $httpClient->get($endpoint);

        $response = json_decode($request->getBody()->getContents());

        return response()->json($response);
    }
}
