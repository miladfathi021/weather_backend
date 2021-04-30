<?php

namespace Tests\Feature;

use App\Models\Weather;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function get_current_weather_from_weathers_table()
    {
        $this->withoutExceptionHandling();

        Weather::factory()->count(3)->create();

        $first_weather = Weather::first();

        $this->getJson(route('current.weather.index'))
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'city_name' => $first_weather->city_name,
                        'temp' => $first_weather->temp
                    ]
                ]
            ]);
    }

    /** @test **/
    public function insert_current_weather_to_database_from_api()
    {
        $this->withoutExceptionHandling();

        $this->assertDatabaseCount('weathers',0);

        $this->postJson(route('current.weather.store'), [])
            ->assertStatus(200);

        $this->assertDatabaseCount('weathers',2);
    }
}
