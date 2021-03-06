<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id');
            $table->string('locale');
            $table->string('title');
            $table->string('h1');
            $table->text('description');
            $table->json('j_data');
            $table->text('meta_description');
            $table->string('meta_title');
            $table->string('meta_keywords');
            $table->string('og_title');
            $table->text('og_description');
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
        Schema::dropIfExists('page_translations');
    }
}
