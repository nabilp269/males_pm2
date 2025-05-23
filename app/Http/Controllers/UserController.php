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

        $bestProducts = Product::withSum('orderItems as total_sold', 'quantity')
            ->orderByDesc('total_sold')
            ->take(6)
            ->get();


        return view('user.index', compact('bestProducts'));
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

    $bestSellerIDs = Product::withSum('orderItems as total_sold', 'quantity')
    ->orderByDesc('total_sold')
    ->take(6)
    ->pluck('id')
    ->toArray();

    return view('user.allproduk', compact('products','bestSellerIDs'));
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
            'pesan' => 'required|string|max:255',
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
            'pesan'=> $request->pesan,
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

    public function uploadBukti(Request $request, $orderId)
{
    $request->validate([
        'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $order = Order::findOrFail($orderId);

    if ($request->hasFile('bukti_pembayaran')) {
        $filename = time() . '.' . $request->bukti_pembayaran->extension();
        $request->bukti_pembayaran->move(public_path('bukti'), $filename);

        $order->bukti_pembayaran = 'bukti/' . $filename;
        $order->save();
    }

    return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload.');
}

}
