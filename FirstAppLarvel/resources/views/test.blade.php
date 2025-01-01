<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo pour {{ $city }}</title>
</head>
<body>

    <h1>Prévisions météo pour {{ $city }}</h1>

    @if(isset($weatherData))
    @dd($weatherData)
        <p><strong>Température :</strong> {{ $weatherData['main']['temp'] }} °C</p>
        <p><strong>Humeur du ciel :</strong> {{ $weatherData['weather'][0]['description'] }}</p>
        <p><strong>Température ressentie :</strong> {{ $weatherData['main']['feels_like'] }} °C</p>
        <p><strong>Humidité :</strong> {{ $weatherData['main']['humidity'] }}%</p>
        <p><strong>Pression :</strong> {{ $weatherData['main']['pressure'] }} hPa</p>
        <p><strong>Vent :</strong> {{ $weatherData['wind']['speed'] }} m/s</p>
    @else
        <p>Impossible de récupérer les informations météo pour {{ $city }}. Vérifiez le nom de la ville et réessayez.</p>
    @endif

</body>
</html>
