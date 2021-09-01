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
