<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutrient extends Model {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo('App\NutrientCategory', 'nutrient_category_id');
    }

    public function foods() {
        return $this->belongsToMany('App\Food', 'food_has_nutrients')->withPivot('value')->withTimestamps();
    }

}
