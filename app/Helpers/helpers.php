<?php

if (!function_exists('fileLink')) {
    function fileLink($path) {
        return $path
            ? '<a href="' . asset('storage/' . $path) . '" target="_blank" class="btn btn-sm btn-primary">عرض</a>'
            : '-';
    }
}
