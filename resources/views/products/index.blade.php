<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Amazing Bread & Cake</title>
    <style>
        /* Styling Global */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            overflow-x: hidden; /* Menghindari scroll horizontal */
        }

        /* Container Utama */
        .container {
            width: 90%;
            margin: auto;
            text-align: center;
        }

        /* Header */
        .header {
            width: 100%; /* Header penuh */
            background-color: #ffcc00;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .nav a:hover {
            color: #ff5733;
        }

        /* Banner Persegi Panjang */
        .banner {
            width: 100%;
            height: 100px; /* Ukuran banner diperkecil */
            margin: 20px 0;
            border-radius: 10px;
            overflow: hidden;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Produk */
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            padding: 20px 0;
        }

        .product {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        /* Efek Hover Produk */
        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        .footer-container {
            width: 90%;
            margin: auto;
        }

        .social-media a {
            color: #ffcc00;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .social-media a:hover {
            color: #ff5733;
        }

        /* Gambar 3 Sejajar */
        .image-row {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .image-row .image-item {
            width: 32%;
            text-align: center;
        }

        .image-row .image-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .image-row .image-item p {
            margin: 10px 0;
            font-size: 16px;
        }

        .image-row .image-item .price {
            font-weight: bold;
            color: #ff5733;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="nav">
            <a href="#">Home</a>
            <a href="#">All Produk</a>
            <a href="#">Tentang Kami</a>
            <a href="#">Kontak</a>
        </div>
    </div>

    <div class="container">
        <!-- Banner Persegi Panjang -->
        <a href="https://cdn.linkumkm.id/library/1/2/0/6/1/2/120612_840x576.jpg" target="_blank" class="banner">
            <img src="https://cdn.linkumkm.id/library/1/2/0/6/1/2/120612_840x576.jpg" alt="Promo Spesial Bulan Ini">
        </a>

        <h2>All Produk</h2>

        <!-- Gambar 3 Sejajar -->
        <div class="image-row">
            <div class="image-item">
                <img src="https://asset.kompas.com/crops/GLtNe54eeZHCZkBFnlO6-zKm7bU=/0x292:1000x959/1200x800/data/photo/2021/08/02/61081f8d3a20b.jpg" alt="Kue 1">
                <p>Nama Kue 1</p>
                <p class="price">Rp 50.000</p>
            </div>
            <div class="image-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLCWXZ-FWXFmlZh6a_M9XMhv9IxroSVMYyyw&s" alt="Kue 2">
                <p>Nama Kue 2</p>
                <p class="price">Rp 60.000</p>
            </div>
            <div class="image-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyeGHTMqqWyxSIB-uvbUmCrsuNv6RNXDxlhg&s" alt="Kue 3">
                <p>Nama Kue 3</p>
                <p class="price">Rp 70.000</p>
            </div>
        </div>

        <div class="products">
            @foreach($products as $product)
                <div class="product">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
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
