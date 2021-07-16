<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('section'); 
            $table->string('position');
            $table->string('slug');
            $table->string('title');
            $table->string('image');
            $table->string('link')->nullable();
            $table->dateTime('publish_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->boolean('status')->default(1);

            $table->string('image_2')->nullable();
            $table->string('link_2')->nullable();
            $table->dateTime('publish_date_2')->nullable();
            $table->dateTime('end_date_2')->nullable();
            $table->boolean('status_2')->default(1);
            
            $table->integer('order')->nullable();
            $table->boolean('double_ad')->default(0);
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
        Schema::dropIfExists('advertisements');
    }
}
