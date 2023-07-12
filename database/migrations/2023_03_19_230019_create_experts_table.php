<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->default('/assets/images/default.jpg');
            $table->string('image1')->default('/assets/images/default.jpg');
            $table->string('image2')->default('/assets/images/default.jpg');
            $table->string('image3')->default('/assets/images/default.jpg');
            $table->string('image4')->default('/assets/images/default.jpg');
            $table->string('image5')->default('/assets/images/default.jpg');
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
        Schema::dropIfExists('experts');
    }
}
