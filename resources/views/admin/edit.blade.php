<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="https://img.freepik.com/premium-vector/vector-logo-cookies-crunchy-desserts_1121638-47.jpg?semt=ais_hybrid&w=740" alt="Promo Spesial Bulan Ini">
        </div>
        
        <div class="category-dropdown">
            Kategori <span>&#9662;</span>
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

    <!-- Main Content -->
    <main>
        <div class="container-kontak">
            <h2>Edit Produk</h2>
            <div class="form-container">
                <form action="{{ route('admin.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf
                    @method('PUT')

                    <label for="name" class="form-label">Nama Produk:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>

                    <label for="price" class="form-label">Harga:</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}" required>

                    <label for="stok" class="form-label">Stock:</label>
                    <input type="number" id="stok" name="stok" class="form-control" value="{{ $product->stok }}" required>

                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" class="form-control" >
                        <option value="{{ $product->kategori }}">{{ $product->kategori }}</option>
                                            
                        @if($product->kategori != 'Roti')
                            <option value="Roti">Roti</option>
                        @endif
                        @if($product->kategori != 'Kue')
                            <option value="Kue">Kue</option>
                        @endif
                        @if($product->kategori != 'Pastry')
                            <option value="Pastry">Pastry</option>
                        @endif
                        @if($product->kategori != 'Donat')
                            <option value="Donat">Donat</option>
                        @endif
                        @if($product->kategori != 'Spesial')
                            <option value="Spesial">Spesial</option>
                        @endif
                    </select>
                    
                    <label for="description" class="form-label">Deskripsi:</label>
                    <textarea id="description" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>

                    <!-- Input URL gambar -->
                    <label for="image_url" class="form-label">Link Gambar Produk</label>
                    <input type="url" class="form-control" id="image_url" name="image_url" value="{{ old('image_url', $product->image) }}" placeholder="Masukkan URL gambar" required>

                    <button type="submit" class="btn-primary ">Simpan Perubahan</button>
                    <a href="javascript:history.back()" class="btn btn-secondary mt-3">Batal</a>
                </form>
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
