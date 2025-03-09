<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ffcc00, #ff9800);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .header {
            width: 100%;
            background: #ffcc00;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }
        .nav {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px 15px;
            transition: all 0.3s;
        }
        .nav a:hover, .nav a.active {
            background-color: rgba(255, 255, 255, 0.3);
        }
        .container {
            width: 40%;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        .form-control {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 2px solid #ddd;
            border-radius: 5px;
            background: #fff;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #ff9800;
            outline: none;
            box-shadow: 0 0 5px rgba(255, 152, 0, 0.5);
        }
        .btn-primary {
            background-color: #ff9800;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 15px;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #e68900;
            transform: scale(1.05);
        }
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
            .nav {
                flex-direction: column;
                align-items: center;
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

    <div class="container">
        <h2>Kontak Kami</h2>
        <p>Silakan isi formulir di bawah ini untuk menghubungi kami.</p>
        
        <form action="{{ route('admin.kontak.send') }}" method="POST">
            @csrf
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
            
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            
            <label for="message" class="form-label">Pesan</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            
            <button type="submit" class="btn-primary">Kirim</button>
        </form>
    </div>
</body>
</html>
