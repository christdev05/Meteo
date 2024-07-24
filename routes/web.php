<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;


Route::get('/',[WeatherController::class, 'home']);
Route::post('/weather', [WeatherController::class, 'showWeather'])->name('weather.show');
