<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function home()
    {
        return view('welcome');
    }

    public function showWeather(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255',
        ], [
            'city.required' => 'Le champ ville est obligatoire.',
            'city.string' => 'Le champ ville doit être une chaîne de caractères.',
            'city.max' => 'Le champ ville ne doit pas dépasser :max caractères.',
        ]);

        try {
            $weatherData = $this->weatherService->getWeatherForCity($request->city);
            return view('weather', ['weatherData' => $weatherData]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Impossible de récupérer les données météorologiques. Veuillez vérifier la ville saisie et réessayer.']);
        }
    }
}
