<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - Amazing Bread & Cake</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* General Styling */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #fffaf0;
            color: #333;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding-bottom: 40px;
        }
        
        /* Header Styling */
        .header {
            background-color: #ffd700;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #f5c200;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo-icon {
            width: 45px;
            height: 45px;
            background-color: #FF8C00;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
            box-shadow: 0 2px 8px rgba(255, 140, 0, 0.4);
            transition: transform 0.3s;
        }
        
        .logo-icon:hover {
            transform: rotate(15deg);
        }
        
        .logo-text {
            font-weight: bold;
            color: #7e5c00;
            font-size: 1.2rem;
            display: none;
        }
        
        @media (min-width: 768px) {
            .logo-text {
                display: block;
            }
        }
        
        /* Category Dropdown Styling */
        .category-dropdown {
            background-color: #fff;
            padding: 10px 15px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            width: 250px;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            border: 2px solid #ffd700;
            font-weight: 500;
        }
        
        .category-dropdown:hover {
            background-color: #fffbeb;
            transform: translateY(-2px);
        }
        
        /* Icons Styling */
        .icons {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        
        .icon {
            font-size: 24px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        
        .icon:hover {
            transform: scale(1.1);
            background-color: rgba(255, 255, 255, 0.3);
        }
        
        /* Navigation Styling */
        .navigation {
            background-color: #fff;
            padding: 15px 5%;
            display: flex;
            justify-content: center;
            border-bottom: 1px solid #f0f0f0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .nav {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }
        
        .nav a {
            text-decoration: none;
            color: #664d00;
            font-weight: 600;
            padding: 8px 15px;
            position: relative;
            transition: all 0.3s;
            border-radius: 20px;
        }
        
        .nav a:hover {
            color: #FF8C00;
            background-color: #fff9e6;
            transform: translateY(-2px);
        }
        
        .nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: 0;
            left: 0;
            background-color: #FF8C00;
            transition: width 0.3s;
            border-radius: 3px;
        }
        
        .nav a:hover::after {
            width: 100%;
        }
        
        /* Products Section */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .page-title {
            position: relative;
            text-align: center;
            margin: 40px 0;
            color: #664d00;
            font-weight: 700;
            font-size: 2.2rem;
        }
        
        .page-title::after {
            content: "";
            display: block;
            width: 120px;
            height: 4px;
            background-color: #ffd700;
            margin: 15px auto 0;
            border-radius: 2px;
        }
        
        /* Card Styling */
        .card {
            transition: all 0.3s;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(255, 215, 0, 0.2);
        }
        
        .card-img-top {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .card:hover .card-img-top {
            transform: scale(1.1);
        }
        
        .card-img-wrapper {
            overflow: hidden;
            position: relative;
        }
        
        .card-ribbon {
            position: absolute;
            top: 20px;
            right: -30px;
            background-color: #FF8C00;
            color: white;
            padding: 5px 30px;
            transform: rotate(45deg);
            font-size: 12px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .card-body {
            padding: 20px;
            border-top: 3px solid #ffe680;
        }
        
        .card-title {
            color: #664d00;
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 10px;
            height: 50px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        
        .card-text {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .card-price {
            color: #FF8C00;
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        .card-rating {
            color: #FFD700;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .card-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        
        .card-btn {
            padding: 8px 15px;
            border-radius: 25px;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-view {
            background-color: #ffd700;
            color: #664d00;
            flex-grow: 1;
        }
        
        .btn-view:hover {
            background-color: #ffcc00;
            transform: scale(1.05);
        }
        
        .btn-cart {
            background-color: #fff;
            color: #664d00;
            border: 2px solid #ffd700;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            padding: 0;
        }
        
        .btn-cart:hover {
            background-color: #ffd700;
            transform: scale(1.1);
        }
        
        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        /* Filtering Options */
        .filter-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .filter-title {
            font-size: 18px;
            font-weight: 600;
            color: #664d00;
            margin-bottom: 15px;
        }
        
        .filter-options {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            background-color: #f9f5e7;
            border: 2px solid #ffe680;
            border-radius: 25px;
            padding: 8px 20px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
            color: #664d00;
        }
        
        .filter-btn:hover,
        .filter-btn.active {
            background-color: #ffd700;
            border-color: #ffcc00;
            transform: scale(1.05);
        }
        
        /* Search Bar */
        .search-bar {
            display: flex;
            margin-bottom: 30px;
        }
        
        .search-input {
            flex-grow: 1;
            padding: 12px 20px;
            border: 2px solid #ffe680;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            outline: none;
            transition: all 0.3s;
            font-size: 16px;
        }
        
        .search-input:focus {
            border-color: #ffd700;
            box-shadow: 0 0 8px rgba(255, 215, 0, 0.3);
        }
        
        .search-btn {
            background-color: #ffd700;
            color: #664d00;
            border: none;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            padding: 0 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .search-btn:hover {
            background-color: #ffcc00;
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin: 40px 0;
            gap: 10px;
        }
        
        .pagination .page-item .page-link {
            color: #664d00;
            border: 2px solid #ffe680;
            border-radius: 8px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        
        .pagination .page-item .page-link:hover {
            background-color: #fffbeb;
            border-color: #ffd700;
        }
        
        .pagination .page-item.active .page-link {
            background-color: #ffd700;
            border-color: #ffd700;
            color: #664d00;
        }
        
        /* Footer */
        footer {
            background-color: #664d00;
            color: white;
            padding: 40px 0 20px;
            margin-top: auto;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .footer-info {
            max-width: 400px;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .footer-logo-icon {
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
        
        .footer-logo-text {
            color: white;
            font-weight: bold;
            font-size: 1.3rem;
        }
        
        .footer-description {
            color: #f9f5e7;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .social-media {
            display: flex;
            gap: 15px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s;
        }
        
        .social-icon:hover {
            background-color: #FF8C00;
            transform: translateY(-5px);
        }
        
        .footer-links {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }
        
        .footer-column h4 {
            color: #ffd700;
            margin-bottom: 20px;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-column h4::after {
            content: '';
            position: absolute;
            width: 30px;
            height: 3px;
            background-color: #ffd700;
            bottom: 0;
            left: 0;
            border-radius: 3px;
        }
        
        .footer-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-column ul li {
            margin-bottom: 12px;
        }
        
        .footer-column ul li a {
            color: #f9f5e7;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .footer-column ul li a:hover {
            color: #ffd700;
            transform: translateX(5px);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
        }
        
        .footer-bottom p {
            color: #f9f5e7;
            font-size: 14px;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .footer-container {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .footer-links {
                width: 100%;
                justify-content: space-between;
            }
        }
        
        @media (max-width: 768px) {
            .nav {
                gap: 15px;
            }
            
            .filter-options {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 30px;
            }
            
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }
        }
        
        @media (max-width: 576px) {
            .category-dropdown {
                width: 150px;
                font-size: 14px;
            }
            
            .icons {
                gap: 12px;
            }
            
            .icon {
                font-size: 20px;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .product-grid {
                grid-template-columns: 1fr;
            }
            
            .search-bar {
                flex-direction: column;
            }
            
            .search-input {
                border-radius: 25px;
                margin-bottom: 10px;
            }
            
            .search-btn {
                border-radius: 25px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <div class="logo">
            <div class="logo-icon">KB</div>
            <div class="logo-text">Amazing Bread & Cake</div>
        </div>
        <div class="category-dropdown">
            <span>Kategori</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="icons">
            <a href="{{ route('admin.history') }}">
                <div class="icon cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </a>
            <div class="icon profile-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="icon">
                <i class="fab fa-instagram" style="color: #E1306C;"></i>
            </div>
            <div class="icon">
                <i class="fab fa-whatsapp" style="color: #25D366;"></i>
            </div>
        </div>
    </div>

    <!-- Navigation Section -->
    <div class="navigation">
        <div class="nav">
            <a href="{{ route('login') }}">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <a href="{{ route('admin.index') }}">
                <i class="fas fa-home"></i> Home
            </a>
            <a href="{{ route('admin.allproduk') }}">
                <i class="fas fa-bread-slice"></i> Semua Produk
            </a>
            <a href="{{ route('admin.tentang') }}">
                <i class="fas fa-info-circle"></i> Tentang Kami
            </a>
            <a href="{{ route('admin.kontak') }}">
                <i class="fas fa-envelope"></i> Kontak
            </a>
            <a href="{{ route('admin.create') }}">
                <i class="fas fa-plus-circle"></i> Tambah Produk
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        <div class="container">
            <!-- Page Title -->
            <h1 class="page-title">Semua Produk Kami</h1>
            
            <!-- Search and Filter Section -->
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Cari produk favorit Anda...">
                <button class="search-btn">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
            
            <!-- Filter Options -->
            <div class="filter-section">
                <h3 class="filter-title">Filter Produk:</h3>
                <div class="filter-options">
                    <button class="filter-btn active">Semua</button>
                    <button class="filter-btn">Roti</button>
                    <button class="filter-btn">Kue</button>
                    <button class="filter-btn">Pastry</button>
                    <button class="filter-btn">Donat</button>
                    <button class="filter-btn">Special</button>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="product-grid">
                @foreach($bestProducts as $product)
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        @if($loop->index % 3 == 0)
                        <div class="card-ribbon">Best Seller</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <div class="card-text">
                            <div class="card-price">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                            <div class="card-rating">
                                <i class="fas fa-star"></i>
                                <span>{{ rand(38, 50) / 10 }}</span>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="card-btn btn-view" onclick="window.location.href='{{ route('admin.detail', $product->id) }}'">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </button>
                            <button class="card-btn btn-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>

    <!-- Footer Section -->
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

    <!-- Include Bootstrap and Fontawesome JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple script to handle filter button selection
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // In a real application, you would filter products here
                // For now, just show a toast or alert
                const filterType = this.textContent;
                console.log(`Filtering by: ${filterType}`);
                
                // You could implement actual filtering here
            });
        });
    </script>
</body>
</html>