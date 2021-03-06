<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmovisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmovis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naslov');
            $table->integer('id_zanr')->unsigned()->index('id_zanr');
            $table->foreign('id_zanr')->references('id')->on('zanrs');
            $table->integer('godina');
            $table->integer('trajanje');
            $table->string('slika'); 
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
        Schema::dropIfExists('filmovis');
    }
}
