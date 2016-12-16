<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodHasNutrientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('food_has_nutrients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id')->unsigned()->default(0);
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->integer('nutrient_id')->unsigned()->default(0);
            $table->foreign('nutrient_id')->references('id')->on('nutrients')->onDelete('cascade');
            $table->float('value')->comment = "per 100 g";
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('food_has_nutrients');
    }
}
