<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
</head>
<body>

    <h2>Riwayat Pembelian</h2>
    <table border="1">
        <tr>
            <th>Produk</th>
            <th>Bukti Pembayaran</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $products[$order['product_id']]->name }}</td>
                <td><img src="{{ asset('storage/' . $order['image']) }}" width="100"></td>
            </tr>
        @endforeach
    </table>

</body>
</html>
