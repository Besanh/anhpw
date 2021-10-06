<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Category extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['name', 'name_seo', 'alias', 'description', 'image', 'big_thumb', 'status'];

    public function getProducts()
    {
        return $this->hasMany(Product::class, 'cate_id', 'id');
    }

    function proccessUpload($request, $model = 'default', $width = 500, $height = 500)
    {
        $img = '';
        $img_thumb = '';
        $img_org = '';
        $img_big_thumb = '';
        try {
            $dir = 'userfiles/images/' . $model . '/';
            $dir_org = 'userfiles/images/' . $model . '_org/';
            $dir_thumb = 'userfiles/images/' . $model . '_thumb/';
            $dir_big_thumb = 'userfiles/images/' . $model . '_big_thumb/';

            $file = $request->file('image');
            $name = microtime(true) . '.' . $file->extension();
            !is_dir($dir) ? createDir($dir) : (!is_dir($dir_org) ? createDir($dir_org) : (!is_dir($dir_thumb) ? createDir($dir_thumb) : (!is_dir($dir_big_thumb) ? createDir($dir_big_thumb) : null)));

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

            if (Image::make($file->getRealPath())->resize(900, 450, function ($constraint) {
                // $constraint->aspectRatio();
            })->save(createImageUri($dir_big_thumb, $name))) {
                $img_big_thumb = createImageUri($dir_big_thumb, $name);
            }

            if (Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
                // $constraint->aspectRatio();
            })->save(createImageUri($dir, $name))) {
                $img = createImageUri($dir, $name);
            }
            // watermark
            return [$img_org, $img_thumb, $img, $img_big_thumb];
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }
}
