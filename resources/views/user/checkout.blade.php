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
        .item-rating {
            color: #ffcb00;
            margin-bottom: 8px;
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
        .checkout-content {
            background-color: #f9f9f9;
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
        .expand-icon {
            font-size: 20px;
            color: #999;
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
        .checkbox-container {
            display: flex;
            align-items: center;
            padding-left: 16px;
            padding-top: 16px;
        }
        input[type="checkbox"] {
            margin-right: 10px;
            width: 18px;
            height: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="checkout-header">
            <a href="{{ route('home') }}" class="back-button">←</a>
            <div class="checkout-title">Chackout</div>
        </div>
        
        <form action="{{ route('processCheckout', $product->id) }}" method="POST">
            @csrf

            <!-- Item Card -->
            <div class="item-card">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="item-image">
                <div class="item-details">
                    <div class="item-name">{{ $product->name }}</div>
                    <div class="item-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    <div class="item-rating">★★★★★</div>
                    <div class="item-controls">
                        <div class="quantity-btn">-</div>
                        <div class="quantity">1</div>
                        <div class="quantity-btn">+</div>
                    </div>
                </div>
            </div>
            
            <!-- Empty space -->
            <div style="height: 10px;"></div>
            
            <!-- Checkout Content -->
            <div class="checkout-content">
                <!-- Pesan Penjual Section -->
                <div class="section-title">Pesan Penjual</div>
                
                <!-- Total Pesanan Section -->
                <div class="section-title">Total Pesanan (1)</div>
                <div class="summary-section">
                    <div class="summary-row">
                        <div>Total Harga (1 barang)</div>
                        <div class="price-column">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    </div>
                </div>
                
                <!-- Metode Pembayaran Section -->
                <div class="section-title">Metode Pembayaran</div>
                <div class="summary-section">
                    <div class="summary-row">
                        <div>Metode Pembayaran</div>
                        <div class="expand-icon">∧</div>
                    </div>
                </div>                
            </div>
            
            <!-- Footer -->
            <div class="checkout-footer">
                <div>
                    <div style="color: #888;">Total</div>
                    <div class="total-amount">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                </div>
                <button type="submit" class="checkout-button">Chackout (1)</button>
            </div>
        </form>
    </div> 
</body>
</html>