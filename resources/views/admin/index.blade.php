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
    background-color: #f4f4f4;
    color: #333;
}

.container {
    width: 90%;
    margin: auto;
    text-align: center;
}

.header {
    width: 100%;
    background-color: #2ecc71;
    padding: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.nav a {
    margin: 0 20px;
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: color 0.3s ease-in-out;
}

.nav a:hover {
    color: #27ae60;
    text-decoration: none; 
}

.banner img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.products {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
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
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
    transition: transform 0.3s ease-in-out;
}

.product:hover img {
    transform: scale(1.05);
}

.product h3 {
    margin: 10px 0;
    font-size: 20px;
    color: #333;
}

.product p.price {
    font-size: 18px;
    font-weight: bold;
    color: #27ae60;
}

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 15px 0;
    margin-top: 30px;
}

.social-media a {
    color: #2ecc71;
    text-decoration: none; 
    margin: 0 10px;
    transition: color 0.3s;
}

.social-media a:hover {
    color: #27ae60;
    text-decoration: none;
}

.product a {
    text-decoration: none; 
    color: inherit; 
}

.product a:hover {
    text-decoration: none; 
}


</style>
    
</head>
<body>

    <div class="header">
        <div class="nav">
            <a href="#">Home</a>
            <a href="{{ route('admin.allproduk') }}">All Produk</a>
            <a href="#">Tentang Kami</a>
            <a href="#">Kontak</a>
            <a href="{{ route('admin.create') }}">Tambah Product</a>
        </div>
    </div>

    <div class="container">
        <a href="https://cdn.linkumkm.id/library/1/2/0/6/1/2/120612_840x576.jpg" target="_blank" class="banner">
            <img src="https://cdn.linkumkm.id/library/1/2/0/6/1/2/120612_840x576.jpg" alt="Promo Spesial Bulan Ini">
        </a>

        <h2>Best Produk</h2>
            
        <div class="products">
            @foreach($products as $product)
                <div class="product">
                    <a href="{{ route('admin.detail', $product->id) }}">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        <h3>{{ $product->name }}</h3>
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
