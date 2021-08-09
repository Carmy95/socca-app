<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoncommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boncommandes', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('depart');
            $table->string('arrive');
            $table->string('typevehicule');
            $table->string('marchandise');
            $table->date('datelivraison');
            $table->unsignedBigInteger('statuscommande_id');
            $table->foreign('statuscommande_id')->references('id')->on('statuscommandes');
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
        Schema::dropIfExists('boncommandes');
    }
}
