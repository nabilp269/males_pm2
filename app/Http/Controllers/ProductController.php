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
        $bestProducts = Product::withSum('orderItems as total_sold', 'quantity')
            ->orderByDesc('total_sold')
            ->take(6)
            ->get();

        return view('admin.index', compact('bestProducts'));
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
            'kategori' => 'required|string|max:255'
        ]);
        
        $imagePath = $request->image_url ?: asset('images/default-product.jpg');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'stok'=>$request->stok,
            'kategori'=>$request->kategori,
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
            'stok' => 'required',
            'kategori' => 'required|string|max:255',
            
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stok = $request->stok;
        $product->kategori = $request->kategori;

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

     public function allProduk(Request $request)
    {
        $query = Product::query();

        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        // Pencarian berdasarkan nama
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();

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

     public function processCheckout(Request $request, $id)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Anda harus login untuk checkout.');
    }

        // Validate the request
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|string|in:bni,bca,bri,dana,ovo,shopeepay',
        ]);

        // Get the product
        $product = Product::findOrFail($id);
        
        // Get quantity from JavaScript (default to 1 if not set)
        $quantity = intval($request->input('quantity', 1));
        
        // Ensure quantity is valid
        if ($quantity < 1 || $quantity > $product->stok) {
            return back()->with('error', 'Jumlah barang tidak valid.');
        }

        // Calculate total price (product price * quantity)
        $subtotal = $product->price * $quantity;
        
        // Add tax if payment method is selected
        $tax = 3000; // Tax amount is fixed at Rp 3.000
        $total = $subtotal + $tax;

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'status' => 'pending',
            'alamat_pengiriman' => Auth::user()->alamat ?? 'Alamat belum diisi', // Get from user profile or add to checkout form
        ]);

        // Create order item
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price,
        ]);

        // Update product stock
        $product->stok -= $quantity;
        $product->save();

        return redirect()->route('admin.history')->with('success', 'Pembelian berhasil! Silakan lakukan pembayaran.');
    }

    public function history()
    {
        // Get orders for the current user with related order items and products
        $orders = Order::with(['orderItems.product'])
                      ->where('user_id', Auth::id())
                      ->orderBy('created_at', 'desc')
                      ->get();
                      
        return view('admin.history', compact('orders'));
    }
    
}
