<?php

use App\Models\Product;
use App\Models\SeoPage;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
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
        $img = '';
        $img_thumb = '';
        $img_org = '';
        try {
            $dir = 'userfiles/images/' . $model . '/';
            $dir_org = 'userfiles/images/' . $model . '_org/';
            $dir_thumb = 'userfiles/images/' . $model . '_thumb/';

            $file = $request->file('image');
            $name = microtime(true) . '.' . $file->extension();
            !is_dir($dir) ? createDir($dir) : (!is_dir($dir_org) ? createDir($dir_org) : (!is_dir($dir_thumb) ? createDir($dir_thumb) : null));

            // Save org
            if (Image::make($file->getRealPath())->save(createImageUri($dir_org, $name))) {
                $img_org = createImageUri($dir_org, $name);
            }
            // Save thumb
            if (Image::make($file->getRealPath())->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save(createImageUri($dir_thumb, $name))) {
                $img_thumb = createImageUri($dir_thumb, $name);
            }

            if (Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
                // $constraint->aspectRatio();
            })->save(createImageUri($dir, $name))) {
                $img = createImageUri($dir, $name);
            }
            // watermark
            return [$img_org, $img_thumb, $img];
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
 * Lay no-image
 */
if (!function_exists('getNoImage')) {
    function getNoImage()
    {
        return asset('/userfiles/images/no-image.png');
    }
}

/**
 * 
 */
if (!function_exists('getConfig')) {
    function getConfig($name, $attribute = null)
    {
        $config = Setting::where([
            ['name', '=', $name],
            ['status', '=', 1]
        ])
            ->first();
        if ($config !== null) {

            if ($attribute === null) {
                return $config->value_setting;
            }

            return Arr::get(json_decode($config->value_setting), "{$attribute}.value");
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

if (!function_exists('minusDateBefore')) {
    function dateBeforeAfter($date, $operator)
    {
        return date('Y-m-d H:i:s', strtotime($operator . '30 day', strtotime($date)));
    }
}

/**
 * Dem so tu trong chuoi va hien thi dung so tu theo y muon
 */
if (!function_exists('getTeaser')) {
    function getTeaser($string, $count)
    {
        $words = explode(' ', $string);
        if (count($words) > $count) {
            $words = array_slice($words, 0, $count);
            $string = implode(' ', $words) . '...';
        }
        return $string;
    }
}

/**
 * Lay gia theo don vi 'VND'
 * &dstrok;
 * đ
 */
if (!function_exists('getPrice')) {
    function getPrice($price, $currency = 'đ')
    {
        $currency = ' VND';
        return number_format($price) . $currency;
    }
}

if (!function_exists('arrayIndex')) {
    function arrayIndex($array, $key, $groups = [])
    {
        $result = [];
        $groups = (array) $groups;

        foreach ($array as $element) {
            $lastArray = &$result;

            foreach ($groups as $group) {
                $value = Arr::get($element, $group);
                if (!array_key_exists($value, $lastArray)) {
                    $lastArray[$value] = [];
                }
                $lastArray = &$lastArray[$value];
            }

            if ($key === null) {
                if (!empty($groups)) {
                    $lastArray[] = $element;
                }
            } else {
                $value = Arr::get($element, $key);
                if ($value !== null) {
                    if (is_float($value)) {
                        $value = floatToString($value);
                    }
                    $lastArray[$value] = $element;
                }
            }
            unset($lastArray);
        }

        return $result;
    }
}

/**
 * Safely casts a float to string independent of the current locale.
 *
 * The decimal separator will always be `.`.
 * @param float|int $number a floating point number or integer.
 * @return string the string representation of the number.
 */
if (!function_exists('floatToString')) {
    function floatToString($number)
    {
        // . and , are the only decimal separators known in ICU data,
        // so its safe to call str_replace here
        return str_replace(',', '.', (string) $number);
    }
}

/**
 * Builds a map (key-value pairs) from a multidimensional array or an array of objects.
 * The `$from` and `$to` parameters specify the key names or property names to set up the map.
 * Optionally, one can further group the map according to a grouping field `$group`.
 *
 * For example,
 *
 * ```php
 * $array = [
 *     ['id' => '123', 'name' => 'aaa', 'class' => 'x'],
 *     ['id' => '124', 'name' => 'bbb', 'class' => 'x'],
 *     ['id' => '345', 'name' => 'ccc', 'class' => 'y'],
 * ];
 *
 * $result = ArrayHelper::map($array, 'id', 'name');
 * // the result is:
 * // [
 * //     '123' => 'aaa',
 * //     '124' => 'bbb',
 * //     '345' => 'ccc',
 * // ]
 *
 * $result = ArrayHelper::map($array, 'id', 'name', 'class');
 * // the result is:
 * // [
 * //     'x' => [
 * //         '123' => 'aaa',
 * //         '124' => 'bbb',
 * //     ],
 * //     'y' => [
 * //         '345' => 'ccc',
 * //     ],
 * // ]
 * ```
 *
 * @param array $array
 * @param string|\Closure $from
 * @param string|\Closure $to
 * @param string|\Closure $group
 * @return array
 */
if (!function_exists('arrayMap')) {
    function arrayMap($array, $from, $to, $group = null)
    {
        $result = [];
        foreach ($array as $element) {
            $key = Arr::get($element, $from);
            $value = Arr::get($element, $to);
            if ($group !== null) {
                $result[Arr::get($element, $group)][$key] = $value;
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}

/**
 * Lay ton kho toi thieu
 */
if (!function_exists('minStock')) {
    function minStock()
    {
        return Cache::remember('minStock',  timeToLive(), function () {
            $data = Setting::where([
                ['name', '=', 'min_stock'],
                ['status', '=', 1]
            ])
                ->select('value_setting')
                ->first();
            return $data ? $data->value_setting : 0;
        });
    }
}

/**
 * Kt hang moi ve hay khong
 */
if (!function_exists('validateArrival')) {
    function validateArrival($date)
    {
        if (DateTime::createFromFormat('Y-m-d H:i:s', $date) !== false) {
            $first_date_month = Carbon::now()->firstOfMonth();
            $last_date_month = Carbon::now()->lastOfMonth();
            if ($date >= $first_date_month && $date <= $last_date_month) {
                return true;
            }
            return false;
        }
        return false;
    }
}

/**
 * Lay 3 sp arrival trong product
 * Hien thi tren menu home
 */
if (!function_exists('getArrivalProduct')) {
    function getArrivalProduct($limit = 3)
    {
        $first_date_month = Carbon::now()->firstOfMonth();
        $last_date_month = Carbon::now()->lastOfMonth();
        $data = Cache::remember('arrival_product_home', timeToLive(), function () use ($limit, $first_date_month, $last_date_month) {
            return Product::select([
                'brands.alias as b_alias',
                'products.id',
                'products.name',
                'products.name_seo',
                'products.image',
                'products.thumb',
                'prices.barcode',
                'categories.name as cate_name',
                'categories.name_seo as cate_name_seo'
            ])
                ->join('brands', 'brands.id', '=', 'products.bid')
                ->join('prices', 'prices.pid', '=', 'products.id')
                ->join('categories', 'categories.id', '=', 'products.cate_id')
                ->where([
                    ['prices.status', '=', 1],
                    ['products.status', '=', 1],
                    ['categories.status', '=', 1],
                    ['prices.stock', '>', 0],
                    ['products.created_at', '>=', $first_date_month],
                    ['products.created_at', '<=', $last_date_month]
                ])
                ->limit($limit)
                ->get();
        });
        if ($data->count() > 0) {
            return $data;
        }
        $products = Product::queryDataProduct()
            ->limit($limit)
            ->get();
        if ($products->count() > 0) {
            return $products;
        }
    }
}

/**
 * Chuyen ten binh thuong thanh alias
 */
if (!function_exists('toAlias')) {
    function toAlias($str)
    {
        $str = toAscii($str);
        $number_list = explode(' ', $str);
        $str = '';
        foreach ($number_list as &$number) {
            if ($number != '')
                $str .= '-' . $number;
        }
        return trim(strtolower(substr($str, 1, strlen($str))));
    }
}

/**
 * Chuyen ma ascii
 */
if (!function_exists('toAscii')) {
    function toAscii($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/[.,]/", "", $str);
        $str = preg_replace("/[^ A-Za-z0-9]/", " ", $str);
        return $str;
    }
}

/**
 * Lay so ki tu theo chieu dai
 */
if (!function_exists('subString')) {
    function subString($string, $number)
    {
        if (strlen($string) <= $number) {
            return $string;
        } else {
            if (strpos($string, " ", $number) > $number) {
                $n = strpos($string, " ", $number);
                $s = substr($string, 0, $n) . "...";
                return $s;
            }
            // trường hợp còn lại không ảnh hưởng tới kết quả 
            $s = substr($string, 0, $number) . "...";
            return $s;
        }
    }
}

/**
 * Lay seo data
 */
if (!function_exists('metaData')) {
    function metaData($param)
    {
        return Cache::remember('metaData', timeToLive(), function () use ($param) {
            $query = SeoPage::select(['title', 'seo_desc', 'seo_keyword', 'seo_robot']);
            if (is_numeric($param)) {
                $query->where('pid', $param);
            } else {
                $query->where('page_name', $param);
            }
            return $query->first();
        });
    }
}

/**
 * Set expire time cache
 */
if (!function_exists('timeToLive')) {
    function timeToLive()
    {
        return 24 * 60 * 60;
    }
}

/**
 * Get device
 */
if (!function_exists('getDevice')) {
    function getDevice()
    {
        return Arr::get($_SERVER, 'HTTP_USER_AGENT');
    }
}
