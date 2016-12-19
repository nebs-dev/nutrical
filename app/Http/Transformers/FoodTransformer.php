<?php

namespace App\Http\Transformers;

use App\Http\Transformers\Transformer;

class FoodTransformer extends Transformer {

    public function transform($item) {
        if (is_object($item)) {
            $item = (array)$item;
        }

        $responseItem = array(
            'id' => (int)$item['id'],
            'title' => $item['title'],
            'code' => $item['code'],
            'description' => $item['description'],
            'nutrients' => $item['nutrients']
        );

        // if (isset($item['distance'])) {
        //     $responseItem['distance'] = (float) $item['distance'];
        // }

        return $responseItem;
    }

}
