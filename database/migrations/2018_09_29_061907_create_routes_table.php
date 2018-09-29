<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('route_code');
            $table->integer('airport_id_from')->unsigned();
            $table->foreign('airport_id_from')
                ->references('id')->on('airports')
                ->onDelete('cascade');
            $table->integer('airport_id_to')->unsigned();
            $table->foreign('airport_id_to')
                ->references('id')->on('airports')
                ->onDelete('cascade');
            $table->string('route_name');
            $table->string('location_code_from');
            $table->string('location_code_to');
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
        Schema::dropIfExists('routes');
    }
}
