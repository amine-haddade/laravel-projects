<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }
    public function getWeather($city)
    {
        // Récupérer l'instance du service Meteo
        $weatherService = app('AppMeteo');
        $weatherData = $weatherService->getWeather($city);

        return view('test', compact('weatherData', 'city'));
    }
}
