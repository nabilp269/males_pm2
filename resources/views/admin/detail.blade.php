<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk {{ $product->name }}</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">KB</div>
        <div class="category-dropdown">Kategori <span>&#9662;</span></div>
        <div class="icons">
            <div class="icon cart-icon">&#128722;</div>
            <div class="icon profile-icon">&#128100;</div>
            <div class="icon instagram-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="2" width="20" height="20" rx="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
            </div>
            <div class="icon whatsapp-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 11.5a8.5 8.5 0 0 1-12.3 7.5L3 21l1.9-5.7A8.5 8.5 0 1 1 21 11.5z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Navigation -->
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

    <!-- Product Detail -->
    <main>
        <div class="product-container d-flex p-4">
            <div class="product-image me-4">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 400px;">
            </div>
            <div class="product-info">
                <h1 class="product-title">{{ $product->name }}</h1>
                <div class="price mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</div>

                <!-- Tampilkan Stok -->
                <div class="stok mb-3">
                    <strong>Stok Tersedia:</strong> {{ $product->stok }}
                </div>

                <p class="description">{{ $product->description }}</p>

                <p class="note text-muted mt-2">
                    * Terdapat perbedaan harga menyesuaikan lokasi cabang. Harga terendah berlaku di cabang Pusat Jogja dan sekitarnya.
                </p>

                <div class="buttons mt-3">
                    <a href="javascript:history.back()" class="btn btn-secondary me-2">
                        &#8592; Kembali
                    </a>
                    <a href="{{ route('admin.edit', $product->id) }}" class="btn btn-warning me-2">
                        Edit
                    </a>
                    <form action="{{ route('admin.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Hapus
                        </button>
                    </form>
                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.checkout', $product->id) }}" class="btn btn-success btn-lg">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center mt-5 py-3 bg-light">
        <p>&copy; 2025 All Amazing Bread & Cake. All Rights Reserved.</p>
        <div class="social-media">
            <a href="#">Facebook</a> | 
            <a href="#">Instagram</a> | 
            <a href="#">Twitter</a>
        </div>
    </footer>
</body>
</html>
