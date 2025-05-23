<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>

    <div class="header">
        <div class="logo">
    <img src="https://img.freepik.com/premium-vector/vector-logo-cookies-crunchy-desserts_1121638-47.jpg?semt=ais_hybrid&w=740" alt="Logo Kue" class="logo-img">
</div>

        <div class="">
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
            <a href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <a href="{{ route('admin.index') }}"><i class="fas fa-home"></i> Home</a>
            <a href="{{ route('admin.allproduk') }}"><i class="fas fa-bread-slice"></i> Semua Produk</a>
            <a href="{{ route('admin.tentang') }}"><i class="fas fa-info-circle"></i> Tentang Kami</a>
            <a href="{{ route('admin.kontak') }}"><i class="fas fa-envelope"></i> Kontak</a>
            <a href="{{ route('admin.create') }}"><i class="fas fa-plus-circle"></i> Tambah Produk</a>
        </div>
    </div>

    <main>  
        <div class="container mt-4">
        
             <form method="GET" action="{{ route('admin.allproduk') }}">
            <div class="row mb-4">
                <div class="search-bar">
                    <input type="text" name="search" class="search-input" placeholder="Cari produk..." value="{{ request('search') }}">
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
                <div class="filter-section">
                    <h3 class="filter-title">Filter Produk:</h3>
                    <div class="filter-options">
                     @php
                        $kategori = request('kategori');
                    @endphp
                    <a href="{{ route('admin.allproduk', ['kategori' => null, 'search' => request('search')]) }}" class="btn {{ !$kategori ? 'filter-btn active' : 'filter-btn' }}">Semua</a>
                    <a href="{{ route('admin.allproduk', ['kategori' => 'Roti', 'search' => request('search')]) }}" class="btn {{ $kategori == 'Roti' ? 'filter-btn active' : 'filter-btn' }}">Roti</a>
                    <a href="{{ route('admin.allproduk', ['kategori' => 'Kue', 'search' => request('search')]) }}" class="btn {{ $kategori == 'Kue' ? 'filter-btn active' : 'filter-btn' }}">Kue</a>
                    <a href="{{ route('admin.allproduk', ['kategori' => 'Pastry', 'search' => request('search')]) }}" class="btn {{ $kategori == 'Pastry' ? 'filter-btn active' : 'filter-btn' }}">Pastry</a>
                    <a href="{{ route('admin.allproduk', ['kategori' => 'Donat', 'search' => request('search')]) }}" class="btn {{ $kategori == 'Donat' ? 'filter-btn active' : 'filter-btn' }}">Donat</a>
                    <a href="{{ route('admin.allproduk', ['kategori' => 'Special', 'search' => request('search')]) }}" class="btn {{ $kategori == 'Special' ? 'filter-btn active' : 'filter-btn' }}">Special</a>
    
                    </div>
                </div>
            </div>
        </form>

            <h2 class="mb-4">Semua Produk Kami</h2>
            <div class="row">
                @foreach($products  as $product)
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
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <div class="footer-logo">
                    <div class="footer-logo-icon">KB</div>
                    <div class="footer-logo-text">Amazing Bread & Cake</div>
                </div>
                <p class="footer-description">
                    Kami menyediakan berbagai pilihan roti dan kue dengan kualitas terbaik menggunakan bahan-bahan pilihan. Nikmati produk bakery kami yang dibuat dengan cinta dan dedikasi.
                </p>
                <div class="social-media">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Navigasi</h4>
                    <ul>
                        <li><a href="{{ route('admin.index') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('admin.allproduk') }}"><i class="fas fa-chevron-right"></i> Semua Produk</a></li>
                        <li><a href="{{ route('admin.tentang') }}"><i class="fas fa-chevron-right"></i> Tentang Kami</a></li>
                        <li><a href="{{ route('admin.kontak') }}"><i class="fas fa-chevron-right"></i> Kontak</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>Kategori</h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-bread-slice"></i> Roti</a></li>
                        <li><a href="#"><i class="fas fa-birthday-cake"></i> Kue Ulang Tahun</a></li>
                        <li><a href="#"><i class="fas fa-cookie"></i> Pastry</a></li>
                        <li><a href="#"><i class="fas fa-cookie-bite"></i> Kue Kering</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>Kontak Kami</h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jl. Roti Enak No. 123, Jakarta</a></li>
                        <li><a href="#"><i class="fas fa-phone"></i> +62 812-3456-7890</a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> info@amazingbread.com</a></li>
                        <li><a href="#"><i class="fas fa-clock"></i> Buka 07:00 - 21:00</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 Amazing Bread & Cake. All Rights Reserved.</p>
        </div>
    </footer>
    
</body>
</html>
