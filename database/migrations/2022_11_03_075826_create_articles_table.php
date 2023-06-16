<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('article_title');
            $table->string('date');
            $table->string('short_description');
            $table->string('introduction');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('key_words');
            $table->string('main_image');
            $table->string('small_image')->nullable();
            $table->string('alt_text_image');
            $table->text('full_description');
            $table->string('slug');
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
        Schema::dropIfExists('articles');
    }
}
