<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SeoPage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::where('status', 1)->select(['id', 'name'])->get();
        $brands = Brand::where('status', 1)->select(['id', 'name'])->get();
        return view('admin.product.create', compact('cates', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request, Product $product)
    {
        $galleries = $thumb_small = $img_thumb_small = null;
        $img_org = $thumb = $img = '';
        if ($request->hasFile('image')) {
            [$img_org, $thumb, $image] = proccessUpload($request, 'product', 650, 750);
            $img_thumb_small = $this->uploadThumbSmall($request->file('image'), 'product_image', 250, 125);
        }
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $node) {
                $galleries[] = $this->uploadGalleries($node, 'product_galleries', 650, 750);
                $thumb_small[] = $this->uploadThumbSmall($node, 'product', 250, 125);
            }
        }
        if ($request->validated()) {
            $product->create([
                'cate_id' => $request->cate_id,
                'bid' => $request->bid,
                'name' => $request->name,
                'name_seo' => $request->name_seo,
                'designer' => $request->designer,
                'public_year' => $request->public_year,
                'promote' => $request->promote,
                'status' => $request->status,
                'description' => $request->description,
                'benefit' => $request->benefit,
                'ingredient' => $request->ingredient,
                'incense_group' => $request->incense_group,
                'styles' => $request->styles,
                'image' => $image,
                'image_thumb_small' => $img_thumb_small,
                'thumb' => $thumb,
                'thumb_small' => json_encode($thumb_small),
                'galleries' => json_encode($galleries)
            ]);
            $seo_page = SeoPage::where(['pid' => $product->id]);
            if ($seo_page) {
                $seo_page->update([
                    'title' => $request->name_seo,
                    'seo_desc' => $request->seo_desc,
                    'seo_keyword' => $request->seo_keyword,
                    'seo_robot' => $request->seo_robot
                ]);
                return redirect()->back()->with('message', 'Create product successfully');
            }
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cates = Category::where('status', 1)->select(['id', 'name'])->get();
        $brands = Brand::where('status', 1)->select(['id', 'name'])->get();
        return view('admin.product.edit', compact('cates', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $galleries = $thumb_small = $img_thumb_small = null;
        $img_org = $thumb = $img = '';
        if ($request->hasFile('image')) {
            [$img_org, $thumb, $img] = proccessUpload($request, 'product', 650, 750);
            $img_thumb_small = $this->uploadThumbSmall($request->file('image'), 'product_image', 250, 125);
        }
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $node) {
                $galleries[] = $this->uploadGalleries($node, 'product_galleries', 650, 750);
                $thumb_small[] = $this->uploadThumbSmall($node, 'product', 250, 125);
            }
        }

        if ($request->validated()) {
            $product->update([
                'cate_id' => $request->cate_id,
                'bid' => $request->bid,
                'name' => $request->name,
                'name_seo' => $request->name_seo,
                'designer' => $request->designer,
                'public_year' => $request->public_year,
                'promote' => $request->promote,
                'status' => $request->status,
                'description' => $request->description,
                'benefit' => $request->benefit,
                'ingredient' => $request->ingredient,
                'incense_group' => $request->incense_group,
                'styles' => $request->styles,
                'image' => $img ? $img : $product->image,
                'image_thumb_small' => $img_thumb_small ? $img_thumb_small : $product->img_thumb_small,
                'thumb' => $thumb ? $thumb : $product->thumb,
                'thumb_small' => $thumb_small ? json_encode($thumb_small) : $product->thumb_small,
                'galleries' => $galleries ? json_encode($galleries) : $product->galleries
            ]);
            $seo_page = SeoPage::where(['pid' => $product->id]);
            if ($seo_page) {
                $seo_page->update([
                    'title' => $request->name_seo,
                    'seo_desc' => $request->seo_desc,
                    'seo_keyword' => $request->seo_keyword,
                    'seo_robot' => $request->seo_robot
                ]);
                return redirect()->back()->with('message', 'Updated product successfully');
            }
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Category::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = Product::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }

    public function uploadGalleries($file, $model = 'default', $width = 500, $height = 500)
    {
        $data = '';
        try {
            $dir = 'userfiles/images/' . $model . '/';
            $dir_org = 'userfiles/images/' . $model . '_org/';
            $dir_thumb = 'userfiles/images/' . $model . '_thumb/';
            $dir_thumb_small = 'userfiles/images/' . $model . '_thumb_small/';

            $name = microtime(true) . '.' . $file->extension();
            !is_dir($dir) ? createDir($dir) : (!is_dir($dir_org) ? createDir($dir_org) : (!is_dir($dir_thumb) ? createDir($dir_thumb) : (!is_dir($dir_thumb_small) ? createDir($dir_thumb_small) : null)));

            // Save org
            Image::make($file->getRealPath())->save(createImageUri($dir_org, $name));
            // Save thumb
            Image::make($file->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save(createImageUri($dir_thumb, $name));

            // Thumb small
            Image::make($file->getRealPath())->resize(250, 170, function ($constraint) {
                // $constraint->aspectRatio();
            })->save(createImageUri($dir_thumb_small, $name));

            if (Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
                // $constraint->aspectRatio();
            })->save(createImageUri($dir, $name))) {
                $data = createImageUri($dir, $name);
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }

    public function uploadThumbSmall($file, $model = 'default', $width = 250, $height = 125)
    {
        $data = '';
        try {
            $dir_thumb_small = 'userfiles/images/' . $model . '_thumb_small/';

            $name = microtime(true) . '.' . $file->extension();
            !is_dir($dir_thumb_small) ? createDir($dir_thumb_small) : null;

            // Thumb small
            if (Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
                // $constraint->aspectRatio();
            })->save(createImageUri($dir_thumb_small, $name))) {
                $data = createImageUri($dir_thumb_small, $name);
            }

            return $data;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }
}
