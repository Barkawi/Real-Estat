<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLignappsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignapps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('loc_id');
            $table->foreign('loc_id')->references('id')->on('locataires');
            $table->unsignedInteger('app_id');
            $table->foreign('app_id')->references('id')->on('appartements');
            $table->datetime('dateh')->default(date('Y-m-d H:i:s'));
            $table->double('loyer')->default(0);
            $table->datetime('dates')->nullable;
            $table->integer('cotion')->default(0);
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
        Schema::dropIfExists('lignapps');
    }
}
