<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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
        return view('dashboard.products.create',compact('brands'));
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
            'slag'=>'required'
        ]);
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'brand_id'=>$request->brand_id,
            'slag'=>$request->slag
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
        $product=Product::findorFail($id);
        return view('dashboard.products.edit',compact('brands','product'));

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
            'slag'=>'required'
        ]);
        $product=Product::findorFail($id);
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'brand_id'=>$request->brand_id,
            'slag'=>$request->slag
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
