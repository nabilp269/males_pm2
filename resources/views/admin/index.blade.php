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
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Menghilangkan garis bawah pada semua tautan */
        a {
            text-decoration: none;
            color: inherit;
        }

        /* Menghilangkan efek garis bawah biru saat diklik atau fokus */
        a:focus, a:hover, a:active {
            text-decoration: none;
            outline: none;
        }

        /* Gaya untuk header dan navigasi */
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

        /* Gaya untuk tombol Home */
        .home-button {
            display: inline-block;
            background-color: #ffcc00;
            color: #333;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease-in-out;
            border: 1px solid #e6b800;
        }

        .home-button:hover {
            background-color: #e6b800;
        }

        /* Banner */
        .banner {
            width: 100%;
            margin: 20px 0;
        }

        .banner img {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Gaya untuk kontainer utama */
        .container {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #ffcc00;
            padding-bottom: 10px;
        }

        /* Product Grid */
        .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .col-md-4 {
            width: 100%;
        }

        /* Card Styles */
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            border: none;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card:active {
            transform: scale(0.98);
        }

        .card-img-top {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .card-title {
            margin: 10px 0;
            font-size: 20px;
            color: #333;
        }

        .card-text strong {
            font-size: 18px;
            font-weight: bold;
            color: #27ae60;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        .social-media a {
            color: #2ecc71;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .social-media a:hover {
            color: #27ae60;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .row {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .row {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }

            .card-img-top {
                height: 180px;
            }
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
        </div>
    </div>


    <div class="container">
        <div class="banner">
            <img src="https://cdn.linkumkm.id/library/1/2/0/6/1/2/120612_840x576.jpg" alt="Promo Spesial Bulan Ini">
        </div>

        <h2>Best Products</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card" onclick="window.location.href='{{ route('admin.detail', $product->id) }}'">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <p>&copy; 2025 All Amazing Bread & Cake. All Rights Reserved.</p>
            <div class="social-media">
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Twitter</a>
            </div>
        </div>
    </footer>
</body>
</html>