<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo('App\FoodCategory', 'food_category_id');
    }


    public function nutrients() {
        return $this->belongsToMany('App\Nutrient', 'food_has_nutrients')->withPivot('value')->withTimestamps();
    }

}
