<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pembelian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    
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
                    <span class="badge {{ $order->status == 'pending' ? 'bg-warning' : ($order->status == 'proses kemas' ? 'bg-success' : 'bg-secondary') }}">
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
