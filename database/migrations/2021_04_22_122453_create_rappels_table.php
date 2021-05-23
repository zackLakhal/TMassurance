<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRappelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rappels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->text('sujet');
            $table->date('dateRappel');
            $table->bigInteger('user_id');
            $table->bigInteger('project_id');
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
        Schema::dropIfExists('rappels');
    }
}
