<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_picture;
use App\Models\Product_tags;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with('orderDetails', 'reviews');
        if($request->has('search')){
            $products = $products->where('name', "LIKE", "%$request->search%");
        }
        $products = $products->where('deleted_at', null);
        $products = $products->paginate(20)->withQueryString();
        $this->data["products"] = $products;
        return view('pages.admin.products.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["category"] = Category::all();
        $this->data["tags"] = Tag::all();
        return view('pages.admin.products.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProductRequest $request)
    {

        try{
            DB::beginTransaction();
            $id = DB::table('products')
                ->insertGetId([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->desc,
                    'category_id' => $request->category,
                    "updated_at" => now()
                ]);
            if($request->has('tag')){
                foreach ($request->tag as $t){
                    DB::table('product_tags')->insert([
                        "product_id" => $id,
                        "tag_id" => $t
                    ]);
                }
            }
            if($request->file('image')){
                $picture = new Product_picture();
                $picture->picture = $this->uploadResized($request, 'img/furniture/', 400);
                $picture->active = 1;
                $picture->created_at = now();
                $picture->product_id = $id;
                $picture->save();
            }
            DB::commit();
            return redirect()->route('admin.products.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return redirect()->back()->withErrors(['Adding product failed.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->data["product"] = Product::with('category', 'productPictures', 'reviews', 'productTags')
            ->where('id', $product->id)->first();
        $this->data["category"] = Category::all();
        $this->data["tags"] = Tag::all();
        return view('pages.admin.products.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {

        try{
            DB::beginTransaction();
            DB::table('products')
                ->where('id', $product->id)
                ->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->desc,
                    'category_id' => $request->category,
                    "updated_at" => now()
                ]);
            Product_tags::where('product_id', $product->id)->delete();
            if($request->has('tag')){
                foreach ($request->tag as $t){
                    DB::table('product_tags')->insert([
                        "product_id" => $product->id,
                        "tag_id" => $t
                    ]);
                }
            }
            if($request->has('picture')){
                foreach ($request->picture as $p){
                    DB::table('product_pictures')->where('id', $p)->update([
                        "active" => 0
                    ]);
                }
            }
            if($request->file('image')){
                $picture = new Product_picture();
                $picture->picture = $this->uploadResized($request, 'img/furniture/', 400);
                $picture->active = 1;
                $picture->created_at = now();
                $picture->product_id = $product->id;
                $picture->save();
            }
            DB::commit();
            return redirect()->route('admin.products.edit', ["product" => $request->product]);
        }
        catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return redirect()->back()->withErrors(['Updating product failed.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        try{
            $product = Product::where('id', $request->id)->first();
            $product->deleted_at = now();
            $product->save();
            return response()->json(["message" => "Success"]);
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
            return response()->json(['message' => 'error message'], 500);
        }
    }
    public function uploadResized(Request $request, $path, $width, $height = null) {
        $image = $request->file('image');
        $imageName = rand(1, 99999) . time() . '.' . $image->extension();

        $filePath = public_path($path);
        $img = Image::make($image->path());
        $img->resize($width, $height, function ($const) {
            $const->aspectRatio();
        })->save($filePath . $imageName);

        if($width != null && $height != null) {
            $canvas = Image::canvas($width, $height);
            $canvas->insert($img, 'center');
            $canvas->save($filePath . $imageName);
        }
        $imageName = $path.$imageName;
        return $imageName;
    }
}
