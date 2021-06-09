<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBazenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bazen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('drzava');
            $table->string('grad');
            $table->string('mesto');
            $table->string('naziv');
            $table->string('sirina');
            $table->string('duzina');
            $table->string('dubina');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bazen');
    }
}
