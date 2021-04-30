<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;
    protected $table = 'weathers';
    protected $fillable = [
        'city_name',
        'wind_speed',
        'humidity',
        'pressure',
        'temp',
        'temp_min',
        'temp_max',
        'lon',
        'lat',
        'description'
    ];

    /**
     * @param $data
     */
    public static function createCurrentWeather($data)
    {
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
}
