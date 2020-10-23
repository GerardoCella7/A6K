<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials_bases', function (Blueprint $table) {
            $table->id();
            $table->smallInteger("quantity");
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')
                  ->references('id')->on('rooms')
                  ->onDelete('cascade');
            $table->integer('material_id')->unsigned();
            $table->foreign('material_id')
                  ->references('id')->on('materials')
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
        Schema::dropIfExists('materials_bases');
    }
}
