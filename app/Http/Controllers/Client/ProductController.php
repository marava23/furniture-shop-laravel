<?php

namespace App\Http\Controllers\Client;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends ClientController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request){
        $products = Product::with('productPictures', 'category', 'reviews', 'productTags');
        if($request->has('search') && $request->search != null){
            $products = $products->where('name', 'LIKE', "%$request->search%");
        }
        if($request->has('sort') && $request->sort != "" && $request->sort!= null){
            $sort = explode( "-",$request->sort);
            $products = $products->orderBy($sort[0], $sort[1]);
        }
        else{
            $products = $products->orderBy('name', 'asc');
        }
        if($request->has('category')){
            $products = $products->whereHas('category', function($query) use ($request){
                $query->whereIn('parent_id', $request->category);
            });
            $products = $products->orWhereIn('category_id', $request->category);
        }
        if($request->has('tag')){
            $products = $products->whereHas('tags', function ($query) use ($request){
                $query->whereIn('id', $request->tag);
            });
        }
        $products = $products->where('deleted_at', null);
        //dd($products->toSql());
        $products = $products->paginate(12)->withQueryString();
        $this->data["products"] = $products;
        $this->data["categories"] = Category::with( 'products', 'children')->get();
        $this->data["tags"] = Tag::with('productTags')->get();
        $this->data["qs"] = $request->all();
        return view('pages.client.products.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        $product = Product::with('productPictures', 'productTags', 'reviews')->where('id', $product->id)->first();
        $this->data["product"] = $product;
        $userId = session()->has('user')  ? session('user')->id : null;
        $this->logAction("User is looking product with id $product->id", $request, $userId);
        return view('pages.client.products.show', $this->data);
    }

}
