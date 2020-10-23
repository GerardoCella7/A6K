<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->dateTime("start");
            $table->dateTime("end");
            $table->integer("price")->unsigned();
            $table->boolean("cancel_status")->default(0);
            $table->boolean("validation_status")->default(0);
            $table->integer('clients_id')->unsigned();
            $table->foreign('clients_id')
                    ->references('id')->on('clients')
                    ->onDelete('cascade');
            $table->integer('rooms_id')->unsigned();
            $table->foreign('rooms_id')
                    ->references('id')->on('rooms')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}
