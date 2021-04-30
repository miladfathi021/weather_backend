<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrentWeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'city_name' => $this->city_name,
            'wind_speed' => $this->wind_speed,
            'humidity' => $this->humidity,
            'pressure' => $this->pressure,
            'temp' => $this->temp,
            'temp_min' => $this->temp_min,
            'temp_max' => $this->temp_max,
            'lon' => $this->lon,
            'lat' => $this->lat,
            'description' => $this->description,
            'created_at' => $this->created_at,
        ];
    }
}
