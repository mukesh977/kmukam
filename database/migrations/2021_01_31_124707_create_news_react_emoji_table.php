<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsReactEmojiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_react_emoji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id');
            $table->foreign('news_id')
                ->references('id')->on('news')
                ->onDelete('cascade');
            $table->integer('love')->default('0');
            $table->integer('wow')->default('0');
            $table->integer('liked')->default('0');
            $table->integer('laugh')->default('0');
            $table->integer('sad')->default('0');
            $table->integer('angry')->default('0');
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
        Schema::dropIfExists('news_react_emoji');
    }
}
