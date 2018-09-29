<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTypePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_type_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_type_id')->unsigned();
            $table->foreign('ticket_type_id')
                ->references('id')->on('ticket_type')
                ->onDelete('cascade');
            $table->integer('flight_id')->unsigned();
            $table->foreign('flight_id')
                ->references('id')->on('flights')
                ->onDelete('cascade');
            $table->decimal('price');
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
        Schema::dropIfExists('ticket_type_prices');
    }
}
