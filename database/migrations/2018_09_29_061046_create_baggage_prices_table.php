<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaggagePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baggage_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weight')->default(0);
            $table->string('unit');
            $table->integer('airline_id')->unsigned();
            $table->foreign('airline_id')
                ->references('id')->on('airlines')
                ->onDelete('cascade');
            $table->decimal('baggage_price');
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
        Schema::dropIfExists('baggage_prices');
    }
}
