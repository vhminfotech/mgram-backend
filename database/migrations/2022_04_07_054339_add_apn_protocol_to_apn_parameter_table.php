<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApnProtocolToApnParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apn_parameter', function (Blueprint $table) {
            $table->string('apn_protocol', 200)->after('apn_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apn_parameter', function (Blueprint $table) {
             $table->integer('apn_protocol')->after('apn_type');
        });
    }
}
