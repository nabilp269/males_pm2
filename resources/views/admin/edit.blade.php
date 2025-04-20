<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <!-- Header -->
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
    <!-- Navigation -->
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
        <h2>Edit Produk</h2>
        <div class="form-container">
            <form action="{{ route('admin.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="name">Nama Produk:</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" required>

                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description">{{ $product->description }}</textarea>

                <label for="price">Harga:</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" required>

                <label for="image_url">Link Gambar Produk:</label>
                <input type="url" id="image_url" name="image_url" value="{{ $product->image }}">

                <button type="submit">Simpan Perubahan</button>
            </form>
            <a href="{{ route('admin.detail', $product->id) }}" class="back">Batal</a>
        </div>
    </div>

</body>
</html>
