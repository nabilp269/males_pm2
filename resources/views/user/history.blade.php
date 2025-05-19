<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pembelian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <style>
/* Reset & dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background: #f9fafb;
    color: #333;
    line-height: 1.6;
}

/* Header back button */
.checkout-header {
    display: flex;
    align-items: center;
    padding: 16px 20px;
    background-color: #fff;
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05);
}

.back-button {
    font-size: 1.5rem;
    text-decoration: none;
    color: #ffc107;
    font-weight: bold;
    margin-right: 10px;
    transition: color 0.3s;
}

.back-button:hover {
    color: #e0a800;
}

.checkout-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
}

/* Container */
.container {
    max-width: 900px;
    margin: 30px auto;
    padding: 0 20px;
}

/* Heading */
h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2rem;
    font-weight: 700;
    color: #222;
}

/* Alerts */
.alert {
    padding: 15px 20px;
    border-radius: 8px;
    font-size: 0.95rem;
    margin-bottom: 20px;
}

.alert-info {
    background: #fff3cd;
    border-left: 5px solid #ffe69c;
    color: #856404;
}

.alert-success {
    background: #d4edda;
    border-left: 5px solid #a3cfbb;
    color: #155724;
}

/* Card Style */
.card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    margin-bottom: 30px;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-4px);
}

.card-header {
    background: #fffbe6;
    padding: 15px 20px;
    border-bottom: 1px solid #ffe082;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-body {
    padding: 20px;
}

/* Badge status */
.badge {
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: capitalize;
}

.bg-warning {
    background-color: #ffecb3;
    color: #8d6e00;
}

.bg-success {
    background-color: #c8e6c9;
    color: #256029;
}

.bg-secondary {
    background-color: #e0e0e0;
    color: #444;
}

/* Produk style */
.product-item, .d-flex {
    display: flex;
    align-items: center;
    gap: 15px;
}

.product-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.border-bottom {
    border-bottom: 1px solid #eee;
    padding-bottom: 12px;
    margin-bottom: 12px;
}

/* Text muted */
.text-muted {
    color: #6c757d;
}

/* Alamat */
.mt-3 {
    margin-top: 1rem;
}

.mb-1 {
    margin-bottom: 0.25rem;
}

.mb-2 {
    margin-bottom: 0.5rem;
}

.mb-4 {
    margin-bottom: 1.5rem;
}

/* Tombol */
.btn-primary {
    background-color: #ffc107;
    border: none;
    color: #000;
    padding: 8px 16px;
    font-weight: 600;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    font-size: 0.9rem;
    transition: background 0.3s ease;
}

.btn-primary:hover {
    background-color: #e0a800;
    color: #000;
}

/* Responsive */
@media (max-width: 768px) {
    .d-flex {
        flex-direction: column;
        align-items: flex-start;
    }

    .card-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }

    .container {
        padding: 0 15px;
    }
}
</style>


    </style>
</head>
<body>

    <div class="checkout-header">
            <a href="javascript:history.back()" class="back-button">← Kembali</a>
        </div>

<div class="container py-4">
    <h2 class="mb-4">Riwayat Pembelian</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <div class="alert alert-info">
            Anda belum memiliki riwayat pembelian.
        </div>
    @else
        @foreach($orders as $order)
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small">Order #{{ $order->id }}</span>
                        <span class="text-muted ml-3 small">{{ $order->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <span class="badge {{ $order->status == 'pending' ? 'bg-warning' : ($order->status == 'completed' ? 'bg-success' : 'bg-secondary') }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</h5>
                    
                    <h6 class="mt-3 mb-2">Detail Produk:</h6>
                    @foreach($order->orderItems as $item)
                        <div class="d-flex mb-2 p-2 border-bottom">
                            @if($item->product)
                                <div class="me-3">
                                    <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="product-image">
                                </div>
                                <div>
                                    <h6 class="mb-1">{{ $item->product->name }}</h6>
                                    <div class="text-muted small">
                                        {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </div>
                                </div>
                            @else
                                <div>Produk tidak tersedia lagi</div>
                            @endif
                        </div>
                    @endforeach
                    
                    <div class="mt-3">
                        <h6>Alamat Pengiriman:</h6>
                        <p>{{ $order->alamat_pengiriman }}</p>
                    </div>

                    {{-- @if($order->bukti_pembayaran)
                    <div class="mt-3">
                        <h6>Bukti Pembayaran:</h6>
                        <img src="{{ asset($order->bukti_pembayaran) }}" alt="Bukti Pembayaran" style="max-width: 300px; border: 1px solid #ccc;">
                    </div>
                    @endif
                     --}}

                   @if($order->status == 'pending')
                    <div class="mt-3">
                    @if($order->bukti_pembayaran)
                        <div class="alert alert-success d-flex align-items-center" style="gap: 8px;">
                            ✅ Bukti pembayaran sudah dikirim.
                        </div>
                    @else
                        <form action="{{ route('orders.uploadBukti', $order->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="bukti_pembayaran" class="form-control mb-2" required>
                            <button type="submit" class="btn btn-primary btn-sm">Upload Bukti Pembayaran</button>
                        </form>
                    @endif
                </div>
            @endif

                </div>
            </div>
        @endforeach
    @endif
</div>
</body>
</html>
