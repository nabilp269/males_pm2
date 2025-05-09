<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .container {
            width: 100%;  
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
            height: 100%;
            overflow-y: auto; 
            display: flex;
            flex-direction: column;
        }

        .back-button {
            background: none;
            border: none;
            color: #000000;
            font-size: 16px;
            cursor: pointer;
            padding: 0;
            margin-bottom: 15px;
            text-align: left;
        }

        .product {
            display: flex;
            border: 2px solid #f90;
            border-radius: 10px;
            padding: 10px;
            align-items: center;
            background: rgba(0,0,0,0.03);
            margin-bottom: 10px;
        }

        .product img {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            object-fit: cover;
            margin-right: 10px;
        }

        .info {
            flex-grow: 1;
        }

        .info h3 {
            margin: 0;
        }

        .price {
            color: #f90;
            font-weight: bold;
        }

        .stars {
            color: gold;
        }

        .qty {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .qty button {
            border: none;
            background: none;
            font-size: 10px;
            cursor: pointer;
        }

        .section {
            margin-top: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            align-items: center;
            margin-top: auto;
        }

        .total {
            font-weight: bold;
            color: orange;
        }

        .checkout-btn {
            padding: 10px 15px;
            background: #ccc;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">

    
    <h2>← Checkout</h2>
    <div class="product">
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
        <div class="info">
            <h3>{{ $product->name }}</h3>
            <span id="hargaSatuan" data-harga="{{ $product->price }}"  data-stok="{{ $product->stok }}" style="color: orange;">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </span>
            
        </div>
        <div class="qty">
            <button onclick="updateQty(-1)" >➖</button>
            <div id="jumlah">1</div>
            <button onclick="updateQty(1)">➕</button>

    <!-- Tombol Kembali -->
    <button class="back-button" onclick="history.back()">← Kembali</button>

    <h2>Checkout</h2>
    <form id="checkoutForm" action="{{route('admin.processCheckout', ['id' => $product->id])}}" method="post">
        @csrf
        <div class="product">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            <div class="info">
                <h3>{{ $product->name }}</h3>
                <span id="hargaSatuan" data-harga="{{ $product->price }}" style="color: orange;">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </span>
            </div>
            <div class="qty">
                <button type="button" onclick="updateQty(-1)">➖</button>
                <div id="jumlah">1</div>
                <button type="button" onclick="updateQty(1)">➕</button>
            </div>
        </div>

        <div class="section">
            <label>Pesan Penjual</label>
            <input type="text" placeholder="Pesan untuk penjual...">

        </div>

        <div class="section">
            <label>Metode Pembayaran</label>
            <select name="payment_method" required>
                <option value="dana">Dana</option>
                <option value="shopeepay">ShopeePay</option>
                <option value="ovo">OVO</option>
                <option value="qris">QRIS</option>
                <option value="bri">BRI</option>
                <option value="bni">BNI</option>
                <option value="mandiri">Mandiri</option>
            </select>
        </div>

        <div class="section" style="display: flex; justify-content: space-between;">
            <span>Total Pesanan (<span id="jumlahTeks">1</span>)</span>
            <span id="totalPesanan" style="color: orange;">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
        </div>

        <div class="footer">
            <label><input type="checkbox"> Semua</label>
            <div>
                Total <span class="total" id="totalFooter">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                <button type="submit" class="checkout-btn" id="checkoutBtn">Checkout (1)</button>
            </div>
        </div>

        <input type="hidden" name="quantity" id="quantityInput" value="1">
        <input type="hidden" name="total_price" id="totalPriceInput" value="{{ $product->price }}">
    </form>
</div>

<script>

    let jumlah = 1;
    const hargaSatuan = parseInt(document.getElementById('hargaSatuan').dataset.harga);
    const stok = parseInt(document.getElementById('hargaSatuan').dataset.stok)

    function updateQty(change) {

        if (change > 0 && jumlah >= stok) {
        jumlah = stok;
        return; 
    }
        jumlah += change;
        if (jumlah < 1) jumlah = 1;

let jumlah = 1;
const hargaSatuan = parseInt(document.getElementById('hargaSatuan').dataset.harga);

function updateQty(change) {
    jumlah += change;
    if (jumlah < 1) jumlah = 1;


    document.getElementById('jumlah').innerText = jumlah;
    document.getElementById('jumlahTeks').innerText = jumlah;

    const total = hargaSatuan * jumlah;

    document.getElementById('totalPesanan').innerText = "Rp " + formatRupiah(total);
    document.getElementById('totalFooter').innerText = "Rp " + formatRupiah(total);
    document.getElementById('checkoutBtn').innerText = `Checkout (${jumlah})`;

    document.getElementById('quantityInput').value = jumlah;
    document.getElementById('totalPriceInput').value = total;
}

function formatRupiah(angka) {
    return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

document.getElementById('checkoutForm').addEventListener('submit', function(event) {
    const metodePembayaran = document.querySelector('select').value;
    if (!metodePembayaran) {
        alert('Silakan pilih metode pembayaran');
        event.preventDefault();
    }
});
</script>
</body>
</html>
