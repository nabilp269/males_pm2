<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>

.header {
            background-color: #fff;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .logo {
            width: 40px;
            height: 40px;
            background-color: #FF8C00;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        .category-dropdown {
            background-color: #f0f0f0;
            padding: 10px 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            width: 250px;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .category-dropdown:hover {
            background-color: #e8e8e8;
        }
        .icons {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .icon {
            font-size: 24px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .icon:hover {
            transform: scale(1.1);
        }
        .cart-icon {
            color: #000;
        }
        .profile-icon {
            color: #000;
        }
        .instagram-icon {
            color: #C13584;
        }
        .whatsapp-icon {
            color: #25D366;
        }
        /* Navigation */
        .navigation {
            background-color: #fff;
            padding: 15px 5%;
            display: flex;
            justify-content: center;
            border-bottom: 1px solid #eee;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .navigation a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            margin: 0 25px;
            padding: 5px 0;
            position: relative;
            transition: color 0.3s;
        }
        .navigation a:hover {
            color: #FF8C00;
        }
        .navigation a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #FF8C00;
            transition: width 0.3s;
        }
        .navigation a:hover::after {
            width: 100%;
        }

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
        <div class="logo">KB</div>
        <div class="category-dropdown">
            Kategori
            <span>&#9662;</span>
        </div>
        <div class="icons">
            <div class="icon cart-icon">&#128722;</div>
            <div class="icon profile-icon">&#128100;</div>
            <div class="icon instagram-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #E1306C;">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
            </div>
            <div class="icon whatsapp-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #25D366;">
                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="navigation">
        <div class="nav">
            <a href="{{ route('login') }}">LogOut</a>
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
