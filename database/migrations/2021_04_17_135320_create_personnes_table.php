<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date2naissance');
            $table->char('sexe', 1);
            $table->string('tel');
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('fonction_id');
            $table->foreign('fonction_id')->references('id')->on('fonctions');
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
        Schema::dropIfExists('personnes');
    }
}
