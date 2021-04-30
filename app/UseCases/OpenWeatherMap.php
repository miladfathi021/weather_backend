<?php


namespace App\UseCases;


class OpenWeatherMap
{
    const CITIES = [
        'Madrid',
        'Barcelona'
    ];

    const API_ID = '79c06f01f69f3f8a9cb88a7949c4a6d5';

    public static function url ($city)
    {
        return 'http://api.openweathermap.org/data/2.5/weather?q='
            . $city .
            '&units=metric&appid=' . static::API_ID;
    }
}
