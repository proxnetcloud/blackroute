<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peoples', function (Blueprint $table) {
            //
            $table->string('birth')->nullable();
            $table->integer('address_id')->nullable();
            $table->string('email')->nullable();
            $table->string('person')->nullable();
            $table->string('representative_cpf')->nullable();
            $table->string('civil_state')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peoples', function (Blueprint $table) {
            //
        });
    }
}
