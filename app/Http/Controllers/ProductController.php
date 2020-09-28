<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('desc');
        $product->category_id = $request->input('category');
        $product->price = $request->input('price');
        $product->stock_amount = $request->input('stock_amount');
        $product->image_url = $request->input('image_url');
        if ($product->save())
            return redirect('/admin');
        else
            return back('DB error', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('product', ['product' => Product::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('editProduct', ['product' => Product::findOrFail($id), 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->input('category');
        $product->name = $request->input('name');
        $product->description = $request->input('desc');
        $product->price = $request->input('price');
        $product->image_url = $request->input('image_url');
        $product->stock_amount = $request->input('stock_amount');
        $product->save();
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);   
        if ($product->delete())
        return redirect('/admin');
    }
}
