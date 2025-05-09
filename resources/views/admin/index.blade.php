<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .card-img-top {
            object-fit: cover;
            height: 200px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header d-flex justify-content-between align-items-center p-3 bg-light">
        <div class="logo">KB</div>
        <div class="category-dropdown">
            Kategori <span>&#9662;</span>
        </div>
        <div class="icons d-flex gap-3">
            <a href="{{ route('admin.history') }}"></a>
            <div class="icon cart-icon">&#128722;</div>
            <div class="icon profile-icon">&#128100;</div>
            <div class="icon instagram-icon">
                <!-- Instagram Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#E1306C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                </svg>
            </div>
            <div class="icon whatsapp-icon">
                <!-- WhatsApp Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#25D366" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <div class="navigation bg-dark text-white py-2">
        <div class="nav d-flex justify-content-center gap-4">
            <a href="{{ route('login') }}" class="text-white">LogOut</a>
            <a href="{{ route('admin.index') }}" class="text-white">Home</a>
            <a href="{{ route('admin.allproduk') }}" class="text-white">All Produk</a>
            <a href="{{ route('admin.tentang') }}" class="text-white">Tentang Kami</a>
            <a href="{{ route('admin.kontak') }}" class="text-white">Kontak</a>
            <a href="{{ route('admin.create') }}" class="text-white">Tambah Produk</a>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        <div class="container my-4">
            <!-- Banner -->
            <div class="banner mb-4">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAV4X_MHueGVd6xfLXw6u59rXH9_pnf93E1Q&s" class="img-fluid" alt="Promo Spesial Bulan Ini">
            </div>

            <!-- Best Products -->
            <h2 class="mb-4 text-center">Best Products</h2>
            <div class="row justify-content-center">
                @foreach($products->sortBy('price')->take(2) as $product)
                    <div class="col-md-4 mb-4 d-flex justify-content-center">
                        <div class="card h-100" style="width: 100%; max-width: 300px;" onclick="window.location.href='{{ route('admin.detail', $product->id) }}'">
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
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

    <!-- Footer -->
    <footer class="bg-light py-3 mt-5">
        <div class="container text-center">
            <p>&copy; 2025 All Amazing Bread & Cake. All Rights Reserved.</p>
            <div class="social-media d-flex justify-content-center gap-3">
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Twitter</a>
            </div>
        </div>
    </footer>

</body>
</html>
