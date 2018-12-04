<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppartementsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartements', function (Blueprint $table) {
            $table->increments('id');
            $table->String('libelle');
            $table->unsignedInteger('imm_id');
            $table->foreign('imm_id')->references('id')->on('immeubles');
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
        Schema::dropIfExists('appartements');
    }
}
