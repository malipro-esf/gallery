<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('name_persian');
            $table->string('name_english');
            $table->string('subject_persian')->nullable();
            $table->string('subject_english')->nullable();
            $table->text('statement_persian')->nullable();
            $table->text('statement_english')->nullable();
            $table->text('description_english')->nullable();
            $table->text('description_persian')->nullable();
            $table->string('year_created')->nullable();
            $table->enum('idea_type',['original','copy','unknown']);
            $table->enum('paint_type',['panel','mural']);
            $table->string('price_rials')->nullable();
            $table->string('price_usd')->nullable();
            $table->enum('inventory_status',['sold','exist'])->default('exist');
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
        Schema::dropIfExists('artworks');
    }
}
