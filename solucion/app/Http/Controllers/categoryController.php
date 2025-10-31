<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('products')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Si piden mostrar producto más costoso en la vista de crear categoria
        $product = Product::orderByDesc('price')->first();
        return view('categories.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255'
        ]);
            Category::create($data);
            return redirect()->route('categories.index')->with('success','Categoría creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
    // otros métodos resource: show, edit, update, destroy (similares)
    public function mostExpensiveProduct()
    {
        $product = Product::orderByDesc('price')->first();
        return view('categories.most_expensive', compact('product'));
    }
}
