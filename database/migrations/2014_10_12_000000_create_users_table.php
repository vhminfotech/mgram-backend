<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('operator');
            $table->string('MSISDN', 50)->unique();
            $table->boolean('chat_feature')->default(1);
            $table->boolean('user_status')->default(1);
            $table->dateTime('last_active', $precision = 0)->nullable();
            
//            $table->string('email')->nullable();
//            $table->string('password')->nullable();
            
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
        Schema::dropIfExists('users');
    }
}