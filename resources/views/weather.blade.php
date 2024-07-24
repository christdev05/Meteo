@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-secondary text-white d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="/css/10127236.png" alt="Logo Météo" style="height: 60px; margin-right: 20px;">
                    <h1 class="mb-0">Météo pour {{ $weatherData['name'] }}</h1>
                </div>
                <a href="/" class="btn btn-light">
                    <i class="fas fa-arrow-left"></i> Retour à la recherche
                </a>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <p class="weather-info"><strong>Température : <br></strong> {{ $weatherData['main']['temp'] }}°C</p>
                    <p class="weather-info"><strong>Description : <br></strong> {{ $weatherData['weather'][0]['description'] }}</p>
                    <p class="weather-info"><strong>Vent : <br></strong> {{ $weatherData['wind']['speed'] }} m/s, {{ $weatherData['wind']['deg'] }}°</p>
                    <p class="weather-info"><strong>Pression : <br></strong> {{ $weatherData['main']['pressure'] }} hPa</p>
                    <p class="weather-info"><strong>Humidité : <br></strong> {{ $weatherData['main']['humidity'] }}%</p>
                    <p class="weather-info"><strong>Point de rosée : <br></strong> {{ $weatherData['main']['temp'] - ((100 - $weatherData['main']['humidity']) / 5) }}°C</p>
                    <p class="weather-info"><strong>Visibilité : <br></strong> {{ $weatherData['visibility'] / 1000 }} km</p>
                </div>

                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
