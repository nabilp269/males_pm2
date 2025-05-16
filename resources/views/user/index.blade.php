<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <style>
        
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">
            <img src="https://img.freepik.com/premium-vector/vector-logo-cookies-crunchy-desserts_1121638-47.jpg?semt=ais_hybrid&w=740" alt="Promo Spesial Bulan Ini">
        </div>

        <div class="category-dropdown">
            Kategori
            <span>&#9662;</span>
        </div>
        <div class="icons">
            <a href="{{ route('admin.history') }}"><div class="icon cart-icon">&#128722;</div></a>
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
            <a href="{{ route('user.index') }}">Home</a>
            <a href="{{ route('user.allproduk') }}">All Produk</a>
            <a href="{{ route('user.tentang') }}">Tentang kami</a>
            <a href="{{ route('user.kontak') }}">Kontak</a>
        </div>
    </div>

    <main>
        <div class="banner">
            <img src="https://img.freepik.com/premium-photo/various-kue-kering-cookies-lebaran-food-background_511235-11190.jpg" alt="Promo Spesial Bulan Ini">
    
            <div class="banner-text">
                <h1>Kue Kering Premium untuk Setiap Momen</h1>
                <p>Kami hadir untuk memanjakan lidah Anda dengan kue kering berkualitas,  
                dibuat dari bahan pilihan dan diproses dengan standar higienis serta teknologi modern.</p>
            </div>
        </div>



            <h2 class="text-center my-4">Best Products</h2>
<div class="row justify-content-center">
    @foreach($products as $product)
        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="card" style="width: 100%; max-width: 350px; cursor: pointer;" onclick="window.location.href='{{ route('admin.detail', $product->id) }}'">
                <img 
                    src="{{ asset($product->image) }}" 
                    class="card-img-top" 
                    alt="{{ $product->name }}" 
                    style="object-fit: cover; height: 250px; width: 100%;"
                >
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text"><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
                </div>
            </div>
        </div>
    @endforeach
</div>
        </div>
    </main>

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