<?php

namespace App\Jobs;

use App\Models\Weather;
use App\UseCases\OpenWeatherMap;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GetCurrentWeatherFromApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        foreach (OpenWeatherMap::CITIES as $city) {
            dump($city);
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
    }
}
