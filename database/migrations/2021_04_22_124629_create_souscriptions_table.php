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
            $table->string('typeContrat')->nullable();
            $table->string('compagnie')->nullable();
            $table->string('formule')->nullable();
            $table->string('cotisationTotal')->nullable();
            $table->string('numSs')->nullable();
            $table->string('numClient')->nullable();
            $table->string('numContrat')->nullable();
            $table->date('dateSignature')->nullable();
            $table->date('dateEffet')->nullable();
            $table->string('numAffiliate')->nullable();
            $table->string('cBanque')->nullable();
            $table->string('cAgence')->nullable();
            $table->string('numCompte')->nullable();
            $table->string('cle')->nullable();
            $table->string('banque')->nullable();
            $table->string('adresse')->nullable();
            $table->string('iban')->nullable();
            $table->string('bic')->nullable();
            $table->string('modePaiement')->nullable();
            $table->string('typePaiement')->nullable();
            $table->string('gratuiteCompagnie')->nullable();
            $table->string('remise')->nullable();
            $table->string('fraisDoss')->nullable();
            $table->string('aide_lois')->nullable();
            $table->string('paiementCb')->nullable();
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
        Schema::dropIfExists('souscriptions');
    }
}
