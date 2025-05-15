    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout Page</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f9f9f9;
            }

            .container {
                margin: 0 auto;
                background-color: #f9f9f9;
            }

            .checkout-header {
                padding: 15px;
                display: flex;
                align-items: center;
                background-color: #fff;
                border-bottom: 1px solid #eee;
            }

            .back-button {
                margin-right: 15px;
                font-size: 24px;
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            .checkout-title {
                font-size: 18px;
                font-weight: bold;
            }

            .item-card {
                display: flex;
                background-color: #fff;
                padding: 16px;
                align-items: center;
                border-bottom: 1px solid #eee;
            }

            .item-image {
                width: 80px;
                height: 80px;
                object-fit: cover;
                border-radius: 4px;
                margin-right: 16px;
            }

            .item-details {
                flex-grow: 1;
            }

            .item-name {
                font-weight: bold;
                font-size: 16px;
                margin-bottom: 6px;
            }

            .item-price {
                color: #ff6600;
                font-weight: bold;
                font-size: 16px;
                margin-bottom: 6px;
            }

            .item-controls {
                display: flex;
                align-items: center;
                margin-top: 5px;
            }

            .quantity-btn {
                width: 24px;
                height: 24px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid #ddd;
                border-radius: 50%;
                background: white;
                cursor: pointer;
                font-weight: bold;
                color: #999;
            }

            .quantity {
                margin: 0 12px;
            }

            .summary-section {
                margin-top: 1px;
                background-color: #fff;
                color: #555;
            }

            .summary-row {
                display: flex;
                justify-content: space-between;
                padding: 16px;
                border-bottom: 1px solid #f5f5f5;
            }

            .summary-row:last-child {
                border-bottom: none;
            }

            .price-column {
                text-align: right;
                color: #ff6600;
                font-weight: bold;
            }

            .section-title {
                padding: 14px 16px;
                color: #888;
                background-color: #f0f0f0;
                font-size: 14px;
                border-bottom: 1px solid #e5e5e5;
            }

            .checkout-footer {
                display: flex;
                justify-content: space-between;
                padding: 16px;
                background-color: #fff;
                border-top: 1px solid #eee;
                position: fixed;
                bottom: 0;
                width: 100%;
                max-width: 480px;
                left: 0;
                right: 0;
                z-index: 10;
            }

            .total-amount {
                font-weight: bold;
                color: #ff6600;
                font-size: 18px;
                margin-top: 4px;
            }

            .checkout-button {
                background-color: #fff;
                color: #222;
                border: 1px solid #ddd;
                padding: 10px 18px;
                border-radius: 6px;
                cursor: pointer;
                font-weight: bold;
            }

            textarea {
                width: 100%;
                height: 80px;
                border: 1px solid #ddd;
                border-radius: 4px;
                padding: 10px;
                margin-top: 10px;
                font-size: 14px;
                resize: none;
            }

            select {
                width: 100%;
                padding: 10px;
                margin-top: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Header -->
            <div class="checkout-header">
                <a href="javascript:history.back()" class="back-button">←</a>
                <div class="checkout-title">Checkout</div>
            </div>

            <form action="{{ route('processCheckout', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Item Card -->
                <div class="item-card">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="item-image">
                    <div class="item-details">
                        <div class="item-name">{{ $product->name }}</div>
                        <div id="hargaSatuan" data-stok="{{ $product->stok }}" data-harga="{{ $product->price }}" class="item-price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                        <div class="item-controls">
                            <div class="quantity-btn" onclick="decreaseQuantity()">-</div>
                            <div class="quantity" id="quantity">1</div>
                            <div class="quantity-btn" onclick="increaseQuantity()">+</div>
                        </div>
                    </div>
                </div>

                <textarea name="seller_message" placeholder="Tulis pesan untuk penjual..."></textarea>

                <div class="summary-section">
                    <div class="summary-row">
                        <div>Total Harga (<span id="itemCount">1</span> barang)</div>
                        <div class="price-column" id="totalPrice">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    </div>
                    <!-- Pajak hanya akan tampil jika metode pembayaran dipilih -->
                    <div class="summary-row" id="taxRow" style="display: none;">
                        <div>Pajak</div>
                        <div class="price-column" id="taxAmount">Rp 3.000</div>
                    </div>
                </div>

                <div class="section-title">Metode Pembayaran</div>
                <select name="metode_pembayaran" required onchange="updateTotalWithTax()">
                    <option value="" disabled selected>Metode Pembayaran</option>
                    <option value="bni">BNI</option>
                    <option value="bca">BCA</option>
                    <option value="bri">BRI</option>
                    <option value="dana">DANA</option>
                    <option value="ovo">OVO</option>
                    <option value="shopeepay">ShopeePay</option>
                </select>

                <!-- Footer -->
                <div class="checkout-footer">
                    <div>
                        <div style="color: #888;">Total</div>
                        <div class="total-amount" id="totalFooter">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    </div>
                    <button type="submit" class="checkout-button" id="checkoutButton">Checkout (1)</button>
                </div>
            </form>
        </div>

        <script>

        let quantity = 1;
        const hargaSatuan = parseInt(document.getElementById('hargaSatuan').dataset.harga);
        const stok = parseInt(document.getElementById('hargaSatuan').dataset.stok);

        const tax = 3000;
        let isTaxVisible = false;

        function updateTotalPrice() {
            const totalProduct = quantity * hargaSatuan;
            document.getElementById('quantity').textContent = quantity;
            document.getElementById('itemCount').textContent = quantity;
            document.getElementById('totalPrice').textContent = "Rp " + totalProduct.toLocaleString('id-ID');

            if (isTaxVisible) {
                const totalWithTax = totalProduct + tax;
                document.getElementById('taxAmount').textContent = "Rp " + tax.toLocaleString('id-ID');
                document.getElementById('totalFooter').textContent = "Rp " + totalWithTax.toLocaleString('id-ID');
            } else {
                document.getElementById('totalFooter').textContent = "Rp " + totalProduct.toLocaleString('id-ID');
            }

            document.getElementById('checkoutButton').textContent = `Checkout (${quantity})`;
        }

        function decreaseQuantity() {
            if (quantity > 1) {
                quantity--;
                updateTotalPrice();
            }
        }

        function increaseQuantity() {
            if (quantity < stok) {
                quantity++;
                updateTotalPrice();
            }
        }

        function updateTotalWithTax() {
            isTaxVisible = true;
            document.getElementById('taxRow').style.display = 'flex';
            updateTotalPrice();
        }

        // Initialize
        updateTotalPrice();

        </script>
    </body>
    </html>
