<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $products = Product::orderBy('name', 'desc')->get();
        return view('products.index', compact('products', 'categories'));
    }

    public function productByCategory(Request $request) {
        $data = $request->all();
        $categories = Category::orderBy('name','asc')->get();
        if($data['category_id']==0) {
            return redirect('/productlist');
        }else{
            $products = Product::where('category_id', $data['category_id'])->get();
            return view('products.index', compact('products', 'categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'price' => 'required',
           'description' => 'required',
           'category_id' => 'required'
        ]);
        $data = $request->all();
        $filename = $request->file('image')->getClientOriginalName();
        $data['photo'] = $filename;
        $file = $request->file('image');
        if($filename) {
            $file->move('../public/images', $filename);
        }
        Product::create($data);
        return redirect('/productlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
           'name' => 'required',
           'price' => 'required',
           'description' => 'required',
           'category_id' => 'required'
        ]);

        $data = $request->all();
        if($request->file('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $data['photo'] = $filename;

            $file = $request->file('image');
            if($filename) {
                $file->move('../public/images', $filename);
            }
        }
        $product->update($data);
        return redirect('/productlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/productlist');
    }
}
