<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
    <!-- Tambahkan CSS dan JavaScript yang diperlukan -->
</head>
<body>

    <h1>Form Pesanan</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div>
            <label for="produk">Produk:</label>
            <input type="text" name="produk" id="produk" required>
        </div>

        <div>
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" required>
        </div>

        <button type="submit">Kirim Pesanan</button>
    </form>

</body>
</html>
