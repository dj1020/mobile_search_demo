<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMobileFkOnBrandId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobiles', function (Blueprint $table) {
            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobiles', function (Blueprint $table) {
            $table->dropForeign('mobiles_brand_id_foreign');
            $table->dropIndex('mobiles_brand_id_foreign');
        });
    }
}
