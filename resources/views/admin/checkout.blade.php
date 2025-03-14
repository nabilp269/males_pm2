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
            max-width: 480px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #e0e0e0;
        }
        .checkout-header {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            background-color: #fff;
        }
        .back-button {
            margin-right: 15px;
            font-size: 20px;
        }
        .checkout-title {
            font-size: 18px;
            font-weight: bold;
        }
        .item-card {
            display: flex;
            background-color: #f9f5f0;
            margin: 10px;
            padding: 10px;
            border-radius: 8px;
        }
        .item-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
        }
        .item-details {
            flex-grow: 1;
        }
        .item-name {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .item-price {
            color: #ff6600;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .item-rating {
            color: #ff9800;
            margin-bottom: 5px;
        }
        .item-controls {
            display: flex;
            align-items: center;
        }
        .checkout-content {
            padding: 10px;
            background-image: linear-gradient(#fce8e8 1px, transparent 1px),
                            
            background-size: 20px 20px;
        }
        .summary-section {
            margin-top: 10px;
            padding: 10px;
            color: #888;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .price-column {
            text-align: right;
            color: #ff6600;
            font-weight: bold;
        }
        .payment-method {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-top: 1px solid #eee;
            align-items: center;
        }
        .expand-icon {
            font-size: 20px;
        }
        .checkout-footer {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            border-top: 1px solid #eee;
            background-color: #fff;
        }
        .total-amount {
            font-weight: bold;
            color: #ff6600;
        }
        .checkout-button {
            background-color: #fff;
            color: #000;
            border: 1px solid #ddd;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="checkout-header">
            <div class="back-button" ><a href="">←</a></div>
            <div class="checkout-title">Checkout</div>
        </div>


        <!-- Item Card -->
        <form action="{{ route('processCheckout', $product->id) }}"  method="POST">
        @csrf
        <div class="item-card">
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="item-image">
            <div class="item-details">
                <div class="item-name">{{ $product->name }}</div>
                <div class="item-price">Rp {{ number_format($product->price, 0, ',', '.') }}/div>
                <div class="item-rating">★★★★★</div>
                <div class="item-controls">
                    <span>-</span>
                    <span style="margin: 0 10px;">1</span>
                    <span>+</span>
                </div>
            </div>
        </div>
    </form>
        <!-- Checkout Content with Grid Background -->
        <div class="checkout-content">
            <!-- Summary Section -->
            <div class="summary-section">
                <div class="summary-row">
                    <div>Pesan Pertama</div>
                </div>
                <div class="summary-row">
                    <div>Total Pesanan (1)</div>
                    <div class="price-column">Rp 15.000</div>
                </div>
                <div class="summary-row">
                    <div>Metode Pembayaran</div>
                    <div class="expand-icon">∧</div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="checkout-footer">
            <div>
                <div>Total</div>
                <div class="total-amount">Rp 15.000</div>
            </div>
            <button class="checkout-button">Checkout (1)</button>
        </div>
    </div>
</body>
</html>