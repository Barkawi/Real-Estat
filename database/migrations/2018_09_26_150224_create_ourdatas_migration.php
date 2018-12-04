<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurdatasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ourdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->String('libelle');
            $table->String('adresse');
            $table->String('logo');
            $table->String('tel');
            $table->String('email');
            $table->String('fix');
            $table->String('website');
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
        Schema::dropIfExists('ourdatas');
    }
}
