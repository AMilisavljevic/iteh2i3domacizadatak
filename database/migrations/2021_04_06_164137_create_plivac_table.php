<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlivacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plivac', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ime_prezime');
            $table->string('telefon')->unique();
            $table->string('vestina_plivanja')->default("");
            $table->date('datum_prijave');
            $table->enum('tip',['pocetnik','profesionalac','trener']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plivac');
    }
}
