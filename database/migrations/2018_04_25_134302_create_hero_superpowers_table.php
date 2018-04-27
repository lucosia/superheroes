<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroSuperpowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_superpower', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('hero_id')->unsigned();
            $table->integer('superpower_id')->unsigned();
            $table->timestamps();
            $table->foreign('hero_id','hero_hero_superpower_fk')->references('id')->on('hero');
            $table->foreign('superpower_id','superpower_hero_superpower_fk')->references('id')->on('superpower');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hero_superpower');
    }
}
