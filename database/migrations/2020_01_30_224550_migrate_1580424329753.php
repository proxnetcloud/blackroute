<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Migrate1580424329753 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('document_subscription', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subscription_id')->nullable();
            $table->bigInteger('document_id')->nullable();
            $table->timestamps();
        });
        Schema::table('people', function (Blueprint $table) {
            $table->bigInteger('mother_id')->nullable();
        });
        Schema::table('phones', function (Blueprint $table) {
            $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
