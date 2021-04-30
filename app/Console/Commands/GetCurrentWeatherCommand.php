<?php

namespace App\Console\Commands;

use App\Jobs\GetCurrentWeatherFromApi;
use Illuminate\Console\Command;

class GetCurrentWeatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:current';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get current weather from api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        GetCurrentWeatherFromApi::dispatch();
    }
}
