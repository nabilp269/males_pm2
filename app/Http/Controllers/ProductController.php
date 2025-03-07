<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }
        $product = Product::findOrFail($id);
        return view('admin.detail', compact('product'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'image_url' => 'nullable|url', // Hanya menerima URL gambar
    ]);

    $imagePath = 'default-product.jpg'; // Gunakan gambar default jika tidak ada URL

    if ($request->filled('image_url')) {
        // Jika user mengisi URL, gunakan URL tersebut
        $imagePath = $request->image_url;
    }

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imagePath, // Simpan URL gambar
    ]);

    return redirect()->route('admin.index')->with('success', 'Produk berhasil ditambahkan!');
}

public function destroy($id) {
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('home')->with('success', 'Produk berhasil dihapus!');
}


public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'image_url' => 'nullable|url',
    ]);

    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;

    if ($request->filled('image_url')) {
        $imagePath = $request->image_url;
    }

    $product->save();

    return redirect()->route('home')->with('success', 'Produk berhasil diperbarui!');
}

public function Allproduk()
{
    $products = Product::all();
    return view('admin.allproduk', compact('products'));
}


}
