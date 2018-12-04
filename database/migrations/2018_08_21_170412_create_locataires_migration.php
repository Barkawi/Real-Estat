<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocatairesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locataires', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nom');
            $table->String('prenom');
            $table->String('cin');
            $table->String('fonction');
            $table->boolean('sf')->default(0);
            $table->boolean('sex')->default(0);
            $table->datetime('datenai');
            $table->String('lieunai');
            $table->String('gsm');
            $table->String('fix');
            $table->String('compte');
            $table->String('banque');
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
        Schema::dropIfExists('locataires');
    }
}
