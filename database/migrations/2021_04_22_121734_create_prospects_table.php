<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('situation')->nullable();
            $table->string('regime')->nullable();//salarie or TNS or alsace-moselle or exploitantAgricole or salarieAgricole or retraiteSalarie or retraiteTNS or retraiteAlsaceMoselle or fonctionPublique or etudiants
            $table->string('tel');
            $table->string('codePostale')->nullable();
            $table->string('ville')->nullable();
            $table->string('adress')->nullable();
            $table->string('activite')->nullable();
            $table->string('tel2')->nullable();
            $table->string('sexe')->nullable();
            $table->string('categoryProf')->nullable();//salarieNonCadre or salarieCadre or commerçant or artisan or chefEntreprise or exploitantAgricole or FonctionnaireClasseA or fonctionnaireHorsClasseA or professionLiberale or retraiteNonCadre or retraiteCadre or sansProfession
            $table->integer('nbreEnfant')->nullable();//je vois qu'on peut déduire ça par le statusMarital qui doit avoir lieu ici et on donnera l'accès de créer autant d'enfant qu'il veut et ça sera lié à un conjoint aussi !!
            $table->string('typeAssurance')->nullable();
            $table->string('statutMaterial')->nullable();//single or married or concubinage or pacs or veuf or separed or divorced
            $table->string('disponibilite')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('wishes')->nullable();// soins or hospitalisation or optique or dentaire
            $table->boolean('is_confirmed')->default(false);
            $table->date('dateConfirmation')->nullable(); 
            $table->bigInteger('user_id');
            $table->bigInteger('provenance_id');
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
        Schema::dropIfExists('prospects');
    }
}
