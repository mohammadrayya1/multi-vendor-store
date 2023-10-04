<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('storeproduct', function (Blueprint $table) {

            $table->index('id');
        });
        Schema::table('storeproduct', function (Blueprint $table) {
            $table->primary(["product_id","store_id"]);
          $table->integer('id')->autoIncrement()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('storeproduct', function (Blueprint $table) {
            //
        });
    }
};
