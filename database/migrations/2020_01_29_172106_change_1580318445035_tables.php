<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Change1580318445035Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            //
//            $table->integer('representative_id')->nullable();
//            $table->dropColumn('representative_cpf');
        });
        Schema::table('addresses', function (Blueprint $table) {
            //
//            $table->string('condominium')->nullable();
//            $table->string('block')->nullable();
//            $table->string('apartment')->nullable();
//            $table->string('coordinates')->nullable();
        });
        Schema::drop('subscriptions');
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('free')->nullable();

            $table->integer('client_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('agreement_id')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('mk_id')->nullable();
            $table->smallInteger('status')->nullable();
            $table->string('comment')->nullable();

            $table->string('block_ins')->nullable();
            $table->string('ap_ins')->nullable();

            $table->string('ibge_code_ins')->nullable();
            $table->string('city_ins')->nullable();
            $table->string('state_ins')->nullable();

            $table->string('block_pay')->nullable();

            $table->string('has_comodato')->nullable();
            $table->string('items_comodato')->nullable();

            $table->string('ibge_code_pay')->nullable();
            $table->string('auto_block')->nullable();;
            $table->string('pay_day')->nullable();;
            $table->decimal('discount_pay', 15, 2)->nullable();;
            $table->decimal('extra_pay', 15, 2)->nullable();;
            $table->string('has_to_pay')->nullable();
            $table->string('financial_api')->nullable();
            $table->string('days_to_block')->nullable();;
            $table->string('auth_type')->nullable();
            $table->string('technology')->nullable();
            $table->string('login')->nullable();
            $table->string('password')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('can_change_password')->nullable();

            $table->string('olt')->nullable();
//            $table->string('pon_port')->nullable();
//            $table->string('cto_number')->nullable();
//            $table->string('cto_splitter')->nullable();
//            $table->string('onu_olt_model')->nullable();
//            $table->string('onu_serial')->nullable();
//            $table->string('onu_mac')->nullable();
//            $table->string('onu_ip')->nullable();
//            $table->string('vlan_id')->nullable();
//            $table->string('w58_ssid')->nullable();
//            $table->string('w58_password')->nullable();
//            $table->string('w58_ap_client')->nullable();
//            $table->string('w58_radio_ip')->nullable();
//            $table->string('w58_vlan_id')->nullable();
//            $table->string('w24_ssid')->nullable();
//            $table->string('w24_password')->nullable();
//            $table->string('w24_ap_client')->nullable();
//            $table->string('w24_radio_ip')->nullable();
//            $table->string('w24_vlan_id')->nullable();
//            $table->string('caixa_switch')->nullable();
//            $table->string('ppoe_fonte')->nullable();
//            $table->string('switch_port')->nullable();
//            $table->string('metro_utp_vlan_id')->nullable();

            $table->integer('netflix')->nullable();
            $table->integer('router')->nullable();

            $table->timestamps();
        });
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('can_change_password');
            $table->dropColumn('block_ins');
            $table->dropColumn('block_pay');
            $table->dropColumn('ibge_code_ins');
            $table->dropColumn('city_ins');
            $table->dropColumn('state_ins');
            $table->dropColumn('ibge_code_pay');
            $table->dropColumn('has_to_pay');
//            $table->integer('status')->change();//
//            $table->smallInteger('status')->nullable()->change();
//            $table->integer('pay')->nullable();//
//            $table->integer('free')->nullable();
        });
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
//            $table->string('name');
            $table->integer('company_id')->nullable();
            $table->timestamps();
        });
        Schema::create('ftth', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subscription_id')->nullable();
            $table->string('olt')->nullable();
            $table->string('pon_port')->nullable();
            $table->integer('cto_id')->nullable();
            $table->integer('cto_port_id')->nullable();
            $table->integer('onu_id')->nullable();
            $table->string('vlan')->nullable();
            $table->timestamps();
        });
        Schema::create('cto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('number')->nullable();
            $table->integer('capacity')->nullable();
            $table->string('coordinates')->nullable();
            $table->timestamps();
        });
        Schema::create('cto_port', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cto_id')->nullable();
            $table->string('port')->nullable();
            $table->integer('company_id')->nullable();
            $table->timestamps();
        });
        Schema::create('onu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model')->nullable();
            $table->string('serial')->nullable();
            $table->string('mac')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();
        });
        Schema::create('wireless', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ssid')->nullable();
            $table->string('password')->nullable();
            $table->string('radio')->nullable();
            $table->string('ip')->nullable();
            $table->string('vlan')->nullable();
            $table->string('frequency')->nullable();
            $table->timestamps();
        });
        Schema::create('metro_utp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('caixa_switch')->nullable();
            $table->string('fonte_poe')->nullable();
            $table->string('switch_port')->nullable();
            $table->string('vlan')->nullable();
            $table->timestamps();
        });
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('text')->nullable();
            $table->integer('company_id')->nullable();
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
        Schema::table('peoples', function (Blueprint $table) {
            //
        });
    }
}
