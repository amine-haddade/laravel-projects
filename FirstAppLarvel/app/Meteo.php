<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getWeather($city)
    {
        // Récupérer la clé API du fichier .env
        $apiKey = env('WEATHER_API_KEY');
        
        // URL de l'API
        $apiUrl = "http://api.weatherapi.com/v1/current.json";

        // Effectuer la requête GET vers l'API
        $response = Http::get($apiUrl, [
            'key' => $apiKey,
            'q' => $city,
        ]);

        // Vérifier si la réponse est valide
        if ($response->successful()) {
            return $response->json(); // Retourner la réponse sous forme de tableau associatif
        }

        // Si la requête échoue, retourner un message d'erreur
        return ['error' => 'Impossible de récupérer les informations météo. Vérifiez le nom de la ville et réessayez.'];
    }
}
