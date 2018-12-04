<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReglementsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglements', function (Blueprint $table) {
            $table->increments('id');
            $table->date('de');
            $table->date('a');
            $table->unsignedInteger('lignapp_id');
            $table->Integer('type');
            $table->String('observation');
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
        Schema::dropIfExists('reglements');
    }
}
