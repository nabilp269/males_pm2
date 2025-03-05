<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PM loro</title>

<style>                         
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fafafa;
        color: #333;
        overflow-x: hidden;
    }
    
    .container {
        width: 90%;
        margin: auto;
        text-align: center;
    }
    
    .header {
        width: 100%;
        background-color: #ff9900;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .nav a {
        margin: 0 15px;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: color 0.3s ease-in-out;
    }
    
    .nav a:hover {
        color: #ff5733;
    }
    
    .banner {
        width: 100%;
        height: 120px;
        margin: 20px 0;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .products {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 25px;
        padding: 30px 0;
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
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s ease-in-out;
    }
    
    .product:hover img {
        transform: scale(1.1);
    }
    
    .product h3 {
        margin: 10px 0;
        font-size: 20px;
        color: #333;
    }
    
    .product p {
        font-size: 14px;
        color: #777;
    }
    
    .product .price {
        font-weight: bold;
        color: black;
        font-size: 18px;
        text-decoration: none; 
    }
    
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
    
    .image-row {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
        gap: 15px;
    }
    
    .image-item {
        width: 32%;
        text-align: center;
        background: #fff;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }
    
    .image-item:hover {
        transform: translateY(-5px);
    }
    
    .image-item a {
        text-decoration: none;
        color: inherit;
        display: block;
    }
    
    .image-item a img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }
    
    .image-item:hover img {
        transform: scale(1.05);
    }
    
    .image-item a .price {
        font-weight: bold;
        color: black;
        font-size: 18px;
    }
</style>
    
</head>
<body>

    <div class="header">
        <div class="nav">
            <a href="#">Home</a>
            <a href="#">All Produk</a>
            <a href="#">Tentang Kami</a>
            <a href="#">Kontak</a>
        </div>
    </div>

    <div class="container">
        <a href="https://cdn.linkumkm.id/library/1/2/0/6/1/2/120612_840x576.jpg" target="_blank" class="banner">
            <img src="https://cdn.linkumkm.id/library/1/2/0/6/1/2/120612_840x576.jpg" alt="Promo Spesial Bulan Ini">
        </a>

        <h2>All Produk</h2>

        <div class="image-row">
            <div class="image-item">
                <a href="{{ route('product.detail', ['id' => 1]) }}">
                    <img src="https://asset.kompas.com/crops/GLtNe54eeZHCZkBFnlO6-zKm7bU=/0x292:1000x959/1200x800/data/photo/2021/08/02/61081f8d3a20b.jpg" alt="Kue 1">
                    <p>Nama Kue 1</p>
                    <p class="price">Rp 50.000</p>
                </a>
            </div>
            
            <div class="image-item">
                <a href="#">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLCWXZ-FWXFmlZh6a_M9XMhv9IxroSVMYyyw&s" alt="Kue 2">
                    <p>Nama Kue 2</p>
                    <p class="price">Rp 60.000</p>
                </a>
            </div>
            <div class="image-item">
                <a href="#">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyeGHTMqqWyxSIB-uvbUmCrsuNv6RNXDxlhg&s" alt="Kue 3">
                    <p>Nama Kue 3</p>
                    <p class="price">Rp 70.000</p>
                </a>
            </div>
        </div>
            
        <div class="products">
            @foreach($products as $product)
                <div class="product">
                    <a href="#">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </a>
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
