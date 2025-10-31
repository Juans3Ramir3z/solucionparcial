<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::with('category')->paginate(10);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
            'price'=>'required|numeric|min:0',
            'quantity'=>'required|integer|min:0'
        ]);

        Product::create($data);
        return redirect()->route('products.index')->with('success','Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('producs.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $categories=Category::all();
        return view('products.edit',compact('product','catgories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);
            $product->update($data);
            return redirect()->route('products.index')->with('success','Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Producto eliminado');
    }

    // Método especial: suma de precios
        public function priceSumCheck()
     {
        $sum = Product::sum('price');
        $message = $sum > 100 ? 'es mayor' : 'es menor';
        return view('products.price_check', compact('sum','message'));
    }
}
