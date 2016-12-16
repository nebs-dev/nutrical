<?php

/**
 * @param array $collection
 * @param $value
 * @param string $key
 * @return float
 */
function fromCollection(array $collection, $value, $key = 'title') {
    $neededObject = array_filter(
        $collection,
        function ($e) use ($key, $value) {
            return $e[$key] == $value;
        }
    );

    return round(reset($neededObject)['pivot']['value'], 2);
}

/**
 * @param null $title
 * @param null $message
 * @return \Illuminate\Foundation\Application|mixed
 */
function flash($title = null, $message = null) {
    $flash = app('App\Http\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}

/**
 * @param $body
 * @param $path
 * @param $type
 * @return string
 */
function link_to($body, $path, $type) {
    $csrf = csrf_field();

    if (is_object($path)) {
        $action = '/' . $path->getTable();

        if (in_array($type, ['PUT', 'PATCH', 'DELETE'])) {
            $action .= '/' . $path->getKey();
        }
    } else {
        $action = $path;
    }

    return <<<EOT

    <form method="POST" action="{$action}">
        $csrf
        <input type="hidden" name="_method" value="{$type}">
        <button type="submit">{$body}</button>
    </form>

EOT;

}