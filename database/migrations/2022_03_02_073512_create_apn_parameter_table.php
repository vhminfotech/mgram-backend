<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApnParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apn_parameter', function (Blueprint $table) {
            $table->id();
            $table->integer('operator');
            $table->string('apn_name', 50);
            $table->string('apn', 50);
            $table->string('proxy', 50);
            $table->string('port', 50);
            $table->string('username', 50);
            $table->string('password', 50);
            $table->string('server', 50);
            $table->string('mmsc', 50);
            $table->string('mms_proxy', 50);
            $table->string('mms_port', 50);
            $table->string('mcc', 50);
            $table->string('mnc', 50);
            $table->string('auth_type', 50);
            $table->string('apn_type', 50);
            $table->string('apn_protocol', 50);
            $table->string('apn_roaming', 50);
            $table->string('bearer', 50);
            $table->string('mvno_type', 50);
            $table->string('mvno_value', 50);
            $table->softDeletes();
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
        Schema::dropIfExists('apn_parameter');
    }
}
