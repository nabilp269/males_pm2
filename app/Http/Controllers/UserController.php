<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('user.index', compact('products'));
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $product = Product::findOrFail($id);
        return view('user.detail', compact('product'));
    }

        public function allProduk()
    {
        $products = Product::all();
        return view('user.allproduk', compact('products'));
    }

    public function tentang()
    {
        return view('user.tentang');
    }

    public function kontak()
    {
        return view('user.kontak');
    }

    public function sendContact(Request $request)
    {
        // Di sini bisa tambahkan validasi dan proses simpan/email
        return back()->with('success', 'Pesan Anda telah dikirim!');
    }

    public function checkout($id)
    {
        $product = Product::findOrFail($id);
        return view('user.checkout', compact('product'));
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
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $product = Product::findOrFail($request->product_id);

    // Simpan gambar bukti pembayaran
    $path = $request->file('image')->store('payment_proofs', 'public');

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

    return redirect()->route('user.history')->with('success', 'Pembelian berhasil!');
}

    public function history()
    {
        $orders = Product::with('product')->get();
        return view('history', compact('orders'));
    }
}
