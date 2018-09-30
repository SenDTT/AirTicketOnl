<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('route_id')->unsigned();
            $table->foreign('route_id')
                ->references('id')->on('routes')
                ->onDelete('cascade');
            $table->integer('airline_id')->unsigned();
            $table->foreign('airline_id')
                ->references('id')->on('airlines')
                ->onDelete('cascade');
            $table->integer('airplane_id')->unsigned();
            $table->foreign('airplane_id')
                ->references('id')->on('airplanes')
                ->onDelete('cascade');
            $table->dateTime('depart_date');
            $table->dateTime('arrive_date');
            $table->decimal('flight_time');
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
        Schema::dropIfExists('flights');
    }
}
