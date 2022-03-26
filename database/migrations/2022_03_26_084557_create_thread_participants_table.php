<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_participants', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('thread_id');
            $table->integer('unread_count')->default(0);
            $table->boolean('is_deleted')->default(0);
            $table->boolean('is_block')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->enum('is_mute', ['none', '8hours', '1week', '1year'])->default('none');
            $table->dateTime('last_sent_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_participants');
    }
}
