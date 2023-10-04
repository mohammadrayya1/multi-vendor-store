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
        Schema::create('stores', function (Blueprint $table) {
            //id bigint unsigned auto increment primary
            //$table->bigIncrements("id")->unique()->autoIncrement()->primary();

            $table->id();
            $table->string("name",50)->unique();
            $table->string('slug')->unique();
            $table->text("description")->nullable();
            $table->string("logo_imag")->nullable();
            $table->string('cover_imag')->nullable();
            $table->enum('status',['active','inactive',])->default('active');
            // 2 columns:created_at and updated_at (timestamp)
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
        Schema::dropIfExists('stores');
    }
};
