<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_id');
            $table->string('title');
            $table->text('caption');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('video_link')->nullable();
            $table->bigInteger('view_count')->default(0);
            $table->boolean('top_news')->nullable();
            $table->boolean('show_image')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('highlighted_news')->default(0);
            $table->boolean('featured_news')->default(0);
            $table->dateTime('published_date');
            $table->text('meta_keyword')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
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
        Schema::dropIfExists('news');
    }
}
