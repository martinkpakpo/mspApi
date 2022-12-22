<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('tiers_id')->nullable();
            $table->foreign('tiers_id')->references('id')->on('clients')->nullOnDelete();
            $table->string('valeur');
            $table->string('valeur_remise');
            $table->string('valeur_paye');
            $table->string('valeur_reste');
            $table->string('valeur_frais');
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
        Schema::dropIfExists('commandes');
    }
}
