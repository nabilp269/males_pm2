<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Reset dan gaya dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #fff9e6;
            color: #333;
            line-height: 1.6;
        }
        
        /* Header kuning */
        .header {
            background-color: #ffcc00;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            position: relative;
            z-index: 100;
        }
        
        .nav {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .nav a {
            color: #664d00;
            font-weight: bold;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .nav a:hover, 
        .nav a[href*="create"] {
            background-color: rgba(255, 255, 255, 0.3);
        }
        
        /* Container utama */
        .container {
            max-width: 800px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        /* Judul */
        h2 {
            color: #664d00;
            font-size: 24px;
            font-weight: bold;
            padding-bottom: 10px;
            margin-bottom: 25px;
            border-bottom: 2px solid #ffcc00;
            text-align: center;
        }
        
        /* Form elements */
        .form-label {
            color: #664d00;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .form-control {
            border: 2px solid #ffe066;
            border-radius: 6px;
            padding: 10px;
            color: #333;
            background-color: #fffbf0;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #ffcc00;
            box-shadow: 0 0 0 3px rgba(255, 204, 0, 0.25);
            background-color: #fff;
        }
        
        /* Alert messages */
        .alert-success {
            background-color: #fffaeb;
            color: #8a6d00;
            border-color: #ffe066;
            border-radius: 6px;
            padding: 12px 15px;
        }
        
        .alert-danger {
            background-color: #fff0f0;
            color: #9e0000;
            border-color: #ffcccc;
            border-radius: 6px;
        }
        
        /* Buttons */
        .btn-primary {
            background-color: #ffcc00;
            color: #664d00;
            border: none;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #e6b800;
            color: #4d3900;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        
        .btn-outline-secondary {
            color: #664d00;
            background-color: transparent;
            border: 2px solid #ffcc00;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .btn-outline-secondary:hover {
            background-color: #ffcc00;
            color: #4d3900;
            border-color: #ffcc00;
        }
        
        /* Back link */
        .back-link {
            margin-bottom: 25px;
        }
        
        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }
        
        .footer-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .social-media {
            margin-top: 15px;
        }
        
        .social-media a {
            color: #ffcc00;
            margin: 0 10px;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .social-media a:hover {
            color: #ffe066;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .nav {
                gap: 10px;
            }
            
            .nav a {
                padding: 6px 12px;
                font-size: 14px;
            }
            
            .container {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="nav">
            <a href="{{ route('admin.index') }}">Home</a>
            <a href="{{ route('admin.allproduk') }}">All Produk</a>
            <a href="{{ route('admin.tentang') }}">Tentang kami</a>
            <a href="{{ route('admin.kontak') }}">Kontak</a>
            <a href="{{ route('admin.create') }}">Tambah Product</a>
        </div>
    </div>

        
        <h2>Tambah Produk</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Link Gambar Produk</label>
                <input type="url" class="form-control" id="image_url" name="image_url" value="{{ old('image_url') }}" placeholder="Masukkan URL gambar" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
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