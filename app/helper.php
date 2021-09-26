<?php

use App\Models\Setting;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;

// Status
if (!function_exists('getStatus')) {
    function getStatus()
    {
        return [
            '0' => 'Inactive',
            '1' => 'Active'
        ];
    }
}

/**
 * Dump ket qua ra man hinh
 */
if (!function_exists('getArray')) {
    function getArray($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}

/**
 * Tao uri image
 */
if (!function_exists('createImageUri')) {
    function createImageUri($dir, $name)
    {
        $uri = createDir($dir . getDateTime(time(), 'Y/m/')) . $name;
        return $uri;
    }
}

/**
 * Tao datetime theo gmdate +7
 */
if (!function_exists('getDateTime')) {
    function getDateTime($time, $format = 'd-m-Y')
    {
        return $time ? gmdate($format, $time + 3600 * 7) : '';
    }
}

/**
 * Tao duong dan folder
 */
if (!function_exists('createDir')) {
    function createDir($dir)
    {
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        return $dir;
    }
}

/**
 * Upload single image
 */
if (!function_exists('proccessUpload')) {
    function proccessUpload($request, $model = 'default', $width = 500, $height = 500)
    {
        $data = '';
        try {
            $dir = 'userfiles/images/' . $model . '/';
            $dir_org = 'userfiles/images/' . $model . '_org/';
            $dir_thumb = 'userfiles/images/' . $model . '_thumb/';

            $file = $request->file('image');
            $name = microtime(true) . '.' . $file->extension();
            !is_dir($dir) ? createDir($dir) : (!is_dir($dir_org) ? createDir($dir_org) : (!is_dir($dir_thumb) ? createDir($dir_thumb) : null));

            // Save org
            Image::make($file->getRealPath())->save(createImageUri($dir_org, $name));
            // Save thumb
            Image::make($file->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save(createImageUri($dir_thumb, $name));

            $height = Image::make($file)->height();
            $width = Image::make($file)->width();
            if ($width >= 900 && $height >= 450) {
                if (Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(createImageUri($dir, $name))) {
                    $data = createImageUri($dir, $name);
                }

                // watermark
            } else {
                if (Image::make($file->getRealPath())->save(createImageUri($dir, $name))) {
                    $data = createImageUri($dir, $name);
                }
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }
}

/**
 * Upload multiple image
 */
if (!function_exists('uploadMultipleImage')) {
    function uploadMultipleImage($file, $model = 'default', $width = 500, $height = 500)
    {
        $data = '';
        try {
            $dir = 'userfiles/images/' . $model . '/';
            $dir_org = 'userfiles/images/' . $model . '_org/';
            $dir_thumb = 'userfiles/images/' . $model . '_thumb/';
            $name = microtime(true) . '.' . $file->extension();
            !is_dir($dir) ? createDir($dir) : (!is_dir($dir_org) ? createDir($dir_org) : (!is_dir($dir_thumb) ? createDir($dir_thumb) : null));

            // Save org
            Image::make($file->getRealPath())->save(createImageUri($dir_org, $name));
            // Save thumb
            Image::make($file->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save(createImageUri($dir_thumb, $name));

            $height = Image::make($file)->height();
            $width = Image::make($file)->width();
            if ($width >= 900 && $height >= 450) {
                if (Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(createImageUri($dir, $name))) {
                    $data = createImageUri($dir, $name);
                }

                // watermark
            } else {
                if (Image::make($file->getRealPath())->save(createImageUri($dir, $name))) {
                    $data = createImageUri($dir, $name);
                }
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }
}

/**
 * Lay duong dan image trong public
 */
if (!function_exists('getImage')) {
    function getImage($dir)
    {
        return asset('/' . $dir);
    }
}

/**
 * 
 */
if (!function_exists('getConfig')) {
    function getConfig($name, $attribute = null)
    {
        $config = Setting::find($name);
        if ($config !== null) {

            if ($attribute === null) {
                return $config->value;
            }

            return Arr::get(json_decode($config->value), "{$attribute}.value");
        }
        return null;
    }
}

/**
 * Check string is json
 */
if (!function_exists('isJson')) {
    function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
