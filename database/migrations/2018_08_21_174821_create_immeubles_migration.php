<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmeublesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immeubles', function (Blueprint $table) {
            $table->increments('id');
            $table->String('libelle');
            $table->unsignedInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->unsignedInteger('prop_id');
            $table->foreign('prop_id')->references('id')->on('proprietaires');
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
        Schema::dropIfExists('immeubles');
    }
}
