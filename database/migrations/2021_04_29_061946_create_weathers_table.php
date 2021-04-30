<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->id();
            $table->string('city_name')->index();
            $table->float('wind_speed');
            $table->float('humidity');
            $table->float('pressure');
            $table->float('temp');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->float('lon');
            $table->float('lat');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weathers');
    }
}
