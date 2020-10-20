<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials_options', function (Blueprint $table) {
            $table->id();
            $table->smallInteger("quantity");
            $table->integer("price");
            $table->foreign('materials_id')
                  ->references('id')->on('materials')
                  ->onDelete('cascade');
            $table->foreign('bookings_id')
                  ->references('id')->on('bookings')
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
        Schema::dropIfExists('materials_options');
    }
}
