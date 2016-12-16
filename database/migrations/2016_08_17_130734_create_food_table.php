<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_category_id')->unsigned()->default(0);
//            $table->foreign('food_category_id')->references('id')->on('food_categories')->onDelete('cascade');
            $table->string('code')->unique();
            $table->string('title')->unique();
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('foods');
    }
}
