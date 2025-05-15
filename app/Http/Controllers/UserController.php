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

        return redirect()->route('user.history')->with('success', 'Pembelian berhasil! Silakan lakukan pembayaran.');
    }

    public function history()
    {
        // Get orders for the current user with related order items and products
        $orders = Order::with(['orderItems.product'])
                      ->where('user_id', Auth::id())
                      ->orderBy('created_at', 'desc')
                      ->get();
                      
        return view('user.history', compact('orders'));
    }
}
