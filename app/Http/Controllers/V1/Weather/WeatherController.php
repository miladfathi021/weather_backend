<?php

namespace App\Http\Controllers\V1\Weather;

use App\Http\Controllers\ApiController;
use App\Http\Resources\CurrentWeatherCollection;
use App\Http\Resources\CurrentWeatherResource;
use App\Models\Weather;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $cities = ['Madrid', 'Barcelona'];
        $appId = '79c06f01f69f3f8a9cb88a7949c4a6d5';

        foreach ($cities as $city) {
            try {
                DB::beginTransaction();

            $result = Http::get(
                'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&appid=' . $appId
            );

            $data = $result->json();

                if ($result->successful()) {
                    Weather::create([
                        'city_name' => $data['name'],
                        'wind_speed' => $data['wind']['speed'],
                        'humidity' => $data['main']['humidity'],
                        'pressure' => $data['main']['pressure'],
                        'temp' => $data['main']['temp'],
                        'temp_min' => $data['main']['temp_min'],
                        'temp_max' => $data['main']['temp_max'],
                        'lon' => $data['coord']['lon'],
                        'lat' => $data['coord']['lat'],
                        'description' => $data['weather'][0]['description'],
                    ]);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }

            DB::commit();
        }

        return response()->json(Weather::all());
    }
}
