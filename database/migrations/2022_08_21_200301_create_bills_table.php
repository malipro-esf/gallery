<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('address_id');
            $table->string('bill_number');
            $table->integer('post_cost')->nullable();
            $table->integer('tax_cost')->nullable();
            $table->integer('total_price');
            $table->enum('verification_status', ['pending','accepted','rejected'])->default('pending');
            $table->enum('post_status', ['readying','dpo','dc']); // dpo=delivered post office -- dc=delivered customer
            $table->string('tracking_code')->nullable();
            $table->text('user_description')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
