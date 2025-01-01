<?php
namespace App\Providers;

use App\Meteo;  // Assurez-vous d'importer la classe Meteo
use App\Services\WeatherService;
use Illuminate\Support\ServiceProvider;

class MeteoAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Lier la classe Meteo dans le conteneur
        $this->app->singleton('AppMeteo', function () {
            return new WeatherService();  // Instancier et retourner la classe Meteo
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

