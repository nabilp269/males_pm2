<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

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
            'image_url' => 'nullable|url',
            'stok' => 'required',
        ]);
        
        $imagePath = $request->image_url ?: asset('images/default-product.jpg');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'stok'=>$request->stok,
        ]);

        return redirect()->route('admin.index')->with('success', 'Produk berhasil ditambahkan!');
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
            $product->image = $request->image_url;
        }

        $product->save();

        return redirect()->route('admin.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.index')->with('success', 'Produk berhasil dihapus!');
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

    public function kontak()
    {
        return view('admin.kontak');
    }

    public function sendContact(Request $request)
    {
        // Di sini bisa tambahkan validasi dan proses simpan/email
        return back()->with('success', 'Pesan Anda telah dikirim!');
    }

    public function checkout($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.checkout', compact('product'));
    }

    public function processCheckout(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Anda harus login untuk checkout.');
    }

    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
        'alamat_pengiriman' => 'required|string|max:255',
        // 'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $product = Product::findOrFail($request->product_id);

    // Simpan gambar bukti pembayaran
    // $path = $request->file('image')->store('payment_proofs', 'public');

    // Hitung total harga
    $total = $product->price * $request->quantity;

    // Buat order
    $order = Order::create([
        'user_id' => Auth::id(),
        'total_price' => $total,
        'status' => 'pending',
        'alamat_pengiriman' => $request->alamat_pengiriman,
        // bisa tambah kolom payment_proof jika kamu ingin simpan di orders
    ]);

    // Tambah item ke order_items
    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'quantity' => $request->quantity,
        'price' => $product->price,
    ]);

    return redirect()->route('admin.history')->with('success', 'Pembelian berhasil!');
}

    public function history()
    {
        $orders = Product::with('product')->get();
        return view('history', compact('orders'));
    }
    
}
