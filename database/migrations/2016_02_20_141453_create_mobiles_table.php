<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('monitor_size');
            $table->integer('weight')->unsigned();
            $table->integer('rom')->unsigned();
            $table->integer('camera_pixel')->unsigned();
            $table->boolean('has_memory_slot');
            $table->string('pic');
            $table->integer('brand_id')->unsigned();
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
        Schema::drop('mobiles');
    }
}
