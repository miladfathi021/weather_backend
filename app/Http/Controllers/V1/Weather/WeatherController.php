<?php

namespace App\Http\Controllers\V1\Weather;

use App\Http\Controllers\ApiController;
use App\Http\Resources\CurrentWeatherCollection;
use App\Http\Resources\CurrentWeatherResource;
use App\Models\Weather;
use App\UseCases\OpenWeatherMap;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class WeatherController extends ApiController
{
    public function index()
    {
        $current_weather = Weather::latest()->get();

        return $this->responseOk(
            new CurrentWeatherCollection($current_weather)
        );
    }

    /**
     * Get current weather from api and insert to database.
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function store(): JsonResponse
    {
        foreach (OpenWeatherMap::CITIES as $city) {
            try {
                DB::beginTransaction();

                $result = Http::get(OpenWeatherMap::url($city));

                if ($result->successful()) {
                    Weather::createCurrentWeather($result->json());
                }

            } catch (\Exception $e) {
                DB::rollBack();
                throw new \Exception();
            }

            DB::commit();
        }

        return response()->json(Weather::all());
    }
}
