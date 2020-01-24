<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('address')->nullable();
            $table->string('number')->nullable();

            $table->string('zip')->nullable();
            $table->string('neighborhood')->nullable();
            //$table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('complement')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();

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
        Schema::dropIfExists('adresses');
    }
}
