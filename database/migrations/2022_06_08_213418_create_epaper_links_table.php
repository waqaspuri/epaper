<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpaperLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epaper_links', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('coordinate')->nullable();
            $table->string('extra1')->nullable();
            $table->string('map_id')->nullable();
            $table->text('link')->nullable();
            $table->integer('epaper_id')->unsigned()->nullable();
//            $table->foreign('epaper_id')->references('id')->on('epapers')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
//        Schema::table('epaper_links', function(Blueprint $table) {
//            $table->foreign('epaper_id')->references('id')->on('epapers')->onUpdate('cascade')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('epaper_links');
    }
}
