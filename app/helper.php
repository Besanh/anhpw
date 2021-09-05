<?php

if (!function_exists('getStatus')) {
    function getStatus()
    {
        return [
            '0' => 'Inactive',
            '1' => 'Active'
        ];
    }
}

if (!function_exists('getArray')) {
    function getArray($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}
