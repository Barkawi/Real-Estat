<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailAppsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_apps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('appartement_id');
            $table->foreign('appartement_id')->references('id')->on('appartements')->onDelete('cascade');
            $table->String('libelle');
            $table->Integer('qte');
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
        Schema::dropIfExists('detail_apps');
    }
}
