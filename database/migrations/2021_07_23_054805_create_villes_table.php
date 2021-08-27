<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pays');
            $table->string('nom');
            $table->bigInteger('nb_pop');
            $table->foreign('id_pays')->references('id')->on('pays')->onDelete('cascade');
            $table->decimal('Latitude', 17, 15);
            $table->decimal('Longitude', 17, 15);


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
        Schema::dropIfExists('villes');
    }
}
