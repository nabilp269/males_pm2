<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Checkout</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f9f9f9; }
        h2 { color: #333; }
        .card {
            background: #fff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .card h4 { margin: 0; color: #ff6600; }
        .card p { margin: 4px 0; }
    </style>
</head>
<body>
    <h2>Riwayat Pembelian</h2>

    @if($product->isEmpty())
        <p>Belum ada riwayat pembelian.</p>
    @else
        @foreach ($product as $item)
            <div class="card">
                <h4>{{ $item->product_name }}</h4>
                <p>Jumlah: {{ $item->quantity }}</p>
                <p>Total: Rp {{ number_format($item->total_price, 0, ',', '.') }}</p>
                <p>Tanggal: {{ $item->created_at->format('d M Y H:i') }}</p>
            </div>
        @endforeach
    @endif

</body>
</html>
