<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(6);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'details' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png|max:2048',
        ]);

$path = $request->file('image')->store('products', 'public');
        $imagePath = $path;
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès !');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'details']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produit modifié avec succès !');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit supprimé.');
    }
}
