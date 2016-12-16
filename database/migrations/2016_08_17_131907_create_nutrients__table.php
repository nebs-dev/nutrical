<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutrientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('nutrients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nutrient_category_id')->unsigned()->default(0);
            $table->foreign('nutrient_category_id')->references('id')->on('nutrient_categories')->onDelete('cascade');
            $table->string('title')->unique();
            $table->string('unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('nutrients');
    }
}
