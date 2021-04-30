<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function get_current()
    {
        $this->assertTrue(true);
    }
}
