<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('dashboard.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands=Brand::all();
        $categories=Category::all();
        return view('dashboard.products.create',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'price'=>'required',
            'brand_id'=>'required',
            'slug'=>'required',
            'category_id'=>'required'
        ]);
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'brand_id'=>$request->brand_id,
            'slug'=>$request->slug,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brands=Brand::all();
        $categories=Category::all();
        $product=Product::findorFail($id);
        return view('dashboard.products.edit',compact('brands','product','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:255',
            'price'=>'required',
            'brand_id'=>'required',
            'slug'=>'required',
            'category_id'=>'required'
        ]);
        $product=Product::findorFail($id);
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'brand_id'=>$request->brand_id,
            'slug'=>$request->slug,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index');
    }
}
