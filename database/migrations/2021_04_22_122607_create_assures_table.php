<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('affiliate'); //conjoint or enfant
            $table->string('civilite');
            $table->string('nom');
            $table->string('prenom');
            $table->string('regime');//salarie or TNS or alsace-moselle or exploitantAgricole or salarieAgricole or retraiteSalarie or retraiteTNS or retraiteAlsaceMoselle or fonctionPublique or etudiants
            
            $table->date('dateNaissance');
            $table->string('categoryProf');//salarieNonCadre or salarieCadre or commerçant or artisan or chefEntreprise or exploitantAgricole or FonctionnaireClasseA or fonctionnaireHorsClasseA or professionLiberale or retraiteNonCadre or retraiteCadre or sansProfession
            $table->string('wishes');// soins or hospitalisation or optique or dentaire
            $table->bigInteger('project_id');
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
        Schema::dropIfExists('assures');
    }
}
