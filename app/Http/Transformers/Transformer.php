<?php

namespace App\Http\Transformers;

abstract class Transformer {

    public function transformCollection(array $items) {
        $items['data'] = array_map([$this, 'transform'], $items['data']);
        return $items;
    }

    abstract public function transform($item);

}
