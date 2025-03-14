<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff9e6;
        }
        .container {
            max-width: 1100px;
        }
        .header {
            background-color: #ffcc00;
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .nav {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .nav a {
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s ease-in-out;
        }
        .nav a:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        h2 {
            color: #664d00;
            font-weight: bold;
            border-bottom: 2px solid #ffd700;
            padding-bottom: 8px;
        }
        .home-button {
            display: inline-block;
            background-color: #ffd700;
            color: #664d00;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease-in-out;
            border: 1px solid #e6c200;
        }
        .home-button:hover {
            background-color: #ffcc00;
            color: #4d3900;
        }
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            border: 1px solid #ffe680;
            background-color: #fffbeb;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(255, 215, 0, 0.3);
            border-color: #ffd700;
        }
        .card:active {
            transform: scale(0.98);
        }
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ffe680;
        }
        .card-title {
            color: #664d00;
            font-weight: bold;
        }
        .card-text strong {
            color: #b38600;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="nav">
            <a href="{{ route('admin.index') }}">Home</a>
            <a href="{{ route('admin.allproduk') }}">All Produk</a>
            <a href="{{ route('admin.tentang') }}">Tentang kami</a>
            <a href="{{ route('admin.kontak') }}">Kontak</a>
            <a href="{{ route('admin.create') }}">Tambah Product</a>
        </div>
    </div>

    <div class="container mt-4">
    
        <h2 class="mb-4">All Products</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card" onclick="window.location.href='{{ route('admin.detail', $product->id) }}'">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
