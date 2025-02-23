    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Produk</title>
        
        @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="product-detail">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

            <div class="buttons">
                <a href="{{ route('home') }}" class="back">Kembali</a>
                <a href="#" class="buy-now">Beli Sekarang</a>
            </div>
        </div>
    </div>
    @endsection

    @push('styles')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            text-align: center;
            padding: 20px;
        }

        .product-detail {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-detail img {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .product-detail h2 {
            margin: 10px 0;
            font-size: 24px;
            color: #333;
        }

        .product-detail p {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
        }

        .product-detail .price {
            font-size: 22px;
            font-weight: bold;
            color: #000;
            margin: 10px 0;
        }

        .buttons {
            margin-top: 15px;
        }

        .buttons a {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            margin: 5px;
            display: inline-block;
            transition: 0.3s;
        }

        .buy-now {
            background-color: #ff5733;
            color: white;
        }

        .back {
            background-color: #6c757d;
            color: white;
        }

        .buy-now:hover {
            background-color: #e64a19;
        }

        .back:hover {
            background-color: #495057;
        }
    </style>
    @endpush

    </head>
    <body>

        <div class="container">
            <div class="product-detail">
                <img src="https://asset.kompas.com/crops/GLtNe54eeZHCZkBFnlO6-zKm7bU=/0x292:1000x959/1200x800/data/photo/2021/08/02/61081f8d3a20b.jpg" alt="Kue 1">
                <h2>Nama Kue 1</h2>
                <p>Lezat dan dibuat dengan bahan berkualitas tinggi. Cocok untuk segala acara.</p>
                <p class="price">Rp 50.000</p>
                
                <div class="buttons">
                    <a href="index.html" class="back">Kembali</a>
                    <a href="#" class="buy-now">Beli Sekarang</a>
                </div>
            </div>
        </div>

    </body>
    </html>
