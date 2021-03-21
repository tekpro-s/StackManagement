<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('title1');
            $table->integer('time1');
            $table->string('comment1')->nullable();
            $table->string('title2')->nullable();
            $table->integer('time2')->nullable();
            $table->string('comment2')->nullable();
            $table->string('title3')->nullable();
            $table->integer('time3')->nullable();
            $table->string('comment3')->nullable();
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
        Schema::dropIfExists('templates');
    }
}
