<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('typeContrat');
            $table->string('compagnie');
            $table->string('formule');
            $table->datetime('dateEffet');
            $table->string('cotisationProspect');
            $table->string('cotisationConjoint');
            $table->string('cotisationEnfant');
            $table->string('cotisationTotal');
            $table->string('numSs');
            $table->string('numClient');
            $table->string('numContrat');
            $table->datetime('dateSignature');
            $table->string('numAffiliate');
            $table->string('cBanque');
            $table->string('cAgence');
            $table->string('numCompte');
            $table->string('cle');
            $table->string('banque');
            $table->string('adresse');
            $table->string('iban');
            $table->string('bic');
            $table->string('modePaiement');
            $table->string('typePaiement');
            $table->integer('prelevementMoisGr');
            $table->string('gratuiteCompagnie');
            $table->string('remise');
            $table->string('fraisDoss');
            $table->string('contratAide');
            $table->string('loiMadelin');
            $table->string('paiementCb');
            //prospect_id:foreign key 
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
        Schema::dropIfExists('souscriptions');
    }
}
