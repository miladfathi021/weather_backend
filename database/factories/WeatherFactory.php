<?php

namespace Database\Factories;

use App\Models\Weather;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WeatherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Weather::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_name' => Str::random(10),
            'wind_speed' => rand(10, 100),
            'humidity' => rand(10, 1000),
            'pressure' => rand(10, 100),
            'temp' => rand(10, 40),
            'temp_min' => rand(10, 100),
            'temp_max' => rand(10, 100),
            'lon' => rand(10, 100),
            'lat' => rand(10, 100),
            'description' => Str::random(30),
        ];
    }
}
