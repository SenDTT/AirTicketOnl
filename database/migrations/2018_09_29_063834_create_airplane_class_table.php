<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirplaneClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplane_class', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seat_class_id')->unsigned();
            $table->foreign('seat_class_id')
                ->references('id')->on('seat_classes')
                ->onDelete('cascade');
            $table->integer('airplane_id')->unsigned();
            $table->foreign('airplane_id')
                ->references('id')->on('airplanes')
                ->onDelete('cascade');
            $table->integer('seat_num');
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
        Schema::dropIfExists('airplane_class');
    }
}
