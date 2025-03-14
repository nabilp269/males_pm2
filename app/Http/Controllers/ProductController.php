<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
            'image_url' => 'nullable|url', // Sesuai dengan input di form
        ]);
    
        // Gunakan gambar default jika tidak ada URL
        $imagePath = $request->image_url ?? 'default-product.jpg';
    
        // Simpan produk ke database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath, // Menggunakan image_url dari form jika tersedia
        ]);

        return redirect()->route('admin.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.index')->with('success', 'Produk berhasil dihapus!');
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
            $product->image = $request->image_url; // Memastikan image diperbarui
        }

        $product->save();

        return redirect()->route('admin.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function allProduk()
    {
        $products = Product::all();
        return view('admin.allproduk', compact('products'));
    }

    public function tentang()
    {
        return view('admin.tentang');
    }

    public function Kontak() {
        return view('admin.kontak');
    }
    
    public function sendContact(Request $request) {
        // Proses pengiriman email atau penyimpanan data kontak
        return back()->with('success', 'Pesan Anda telah dikirim!');
    }

    /* cekout */

    public function checkout($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.checkout', compact('product'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Simpan gambar bukti pembayaran
        $path = $request->file('image')->store('payment_proofs', 'public');

        // Simpan order ke database
        Product::create([
            'product_id' => $request->product_id,
            'image' => $path,
        ]);

        return redirect()->route('history')->with('success', 'Pembelian berhasil!');
    }

    public function history()
    {
        $orders = Product::with('product')->get();
        return view('history', compact('orders'));
    }
}
