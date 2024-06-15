<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('artwork_id');
            $table->string('user_fullname');
            $table->integer('user_id')->nullable();
            $table->string('email');
            $table->text('message');
            $table->text('reply');
            $table->text('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->enum('verification_status',['0','1'])->default('0');
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
        Schema::dropIfExists('comments');
    }
}
