<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_social_media', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_id')->references('id')
                                              ->on('authors')
                                              ->onDelete('cascade');
            $table->string('name');
            $table->string('social_media_icon')->nullable();
            $table->string('social_media_link')->nullable();
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
        Schema::dropIfExists('author_social_media');
    }
}
