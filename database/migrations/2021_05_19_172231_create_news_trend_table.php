<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTrendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_trend', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id');
            $table->foreign('news_id')
                ->references('id')
                ->on('news')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('trend_id');
            $table->foreign('trend_id')
                ->references('id')
                ->on('trends')
                ->onUpdate('cascade')
                ->onDelete('cascade');          

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
        Schema::dropIfExists('news_trend');
    }
}
