<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuts', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('crmStatut');
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
        Schema::dropIfExists('statuts');
    }
}

    /*statut {à traiter, devis envoyé , à relancer , ne répond pas , perdu ,contrat actif ,
 près adhesion,inexploitable,contrat à enregister,souscription,retracter,impayer,résilier,contemtieux,échu}*/