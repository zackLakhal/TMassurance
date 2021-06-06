<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provenances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('cle');
            $table->double('prix');//enfaite c'est le prix des données de prospect fournies par le fournisseur
            $table->text('description')->nullable();
            $table->bigInteger('fournisseur_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provenances');
    }
}
