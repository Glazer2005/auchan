<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();


        $query = Product::with('category');

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

    // paginate et conserve les query parameters pour les liens suivant/précédent
    $products = $query->paginate(9)->appends($request->all());

    $totalProducts = Product::count();
    $lastProduct = Product::latest()->first();

    return view('products.index', compact('products','categories','totalProducts','lastProduct'));
}
    
    public function create()
    {
        return view('products.create', ['categories' => Category::all()]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'details' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

$path = $request->file('image')->store('products', 'public');
        $imagePath = $path;
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
            'image' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès !');
        
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'details' => 'nullable|string',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

if($request->hasFile('image')){
    // Supprimer ancienne image
    if($product->image && Storage::disk('public')->exists($product->image)){
        Storage::disk('public')->delete($product->image);
    }

    // Stocker nouvelle image
    $data['image'] = $request->file('image')->store('products', 'public');
}
    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès !');
}


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit supprimé.');
    }
}

