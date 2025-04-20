<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Korean Garlic Bread</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        /* Header Styling */
        .header {
            background-color: #fff;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .header {
            background-color: #ffcc00;
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .logo {
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
        .category-dropdown {
            background-color: #f0f0f0;
            padding: 10px 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            width: 250px;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .category-dropdown:hover {
            background-color: #e8e8e8;
        }
        .icons {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .icon {
            font-size: 24px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .icon:hover {
            transform: scale(1.1);
        }
        .cart-icon {
            color: #000;
        }
        .profile-icon {
            color: #000;
        }
        .instagram-icon {
            color: #C13584;
        }
        .whatsapp-icon {
            color: #25D366;
        }
        /* Navigation */
        .navigation {
            background-color: #fff;
            padding: 15px 5%;
            display: flex;
            justify-content: center;
            border-bottom: 1px solid #eee;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .navigation a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            margin: 0 25px;
            padding: 5px 0;
            position: relative;
            transition: color 0.3s;
        }
        .navigation a:hover {
            color: #FF8C00;
        }
        .navigation a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #FF8C00;
            transition: width 0.3s;
        }
        .navigation a:hover::after {
            width: 100%;
        }

        .nav {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .nav a {
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s ease-in-out;
        }
        .nav a:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
        a {
            text-decoration: none;
            color: inherit;
        }

        /* Product Detail */
        .product-container {
            display: flex;
            padding: 40px 5%;
            background-color: #fff;
            gap: 40px;
            max-width: 1200px;
            margin: 30px auto;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .product-image {
            flex: 1;
            max-width: 400px;
        }
        .product-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .product-image img:hover {
            transform: scale(1.02);
        }
        .product-info {
            flex: 1.5;
            padding: 0;
        }
        .product-title {
            font-size: 32px;
            margin-bottom: 15px;
            font-weight: 600;
            color: #000;
        }
        .ratings {
            display: flex;
            margin-bottom: 15px;
            color: #FFD700;
            font-size: 20px;
        }
        .price {
            font-size: 28px;
            color: #FF8C00;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .description {
            color: #555;
            margin-bottom: 20px;
            line-height: 1.6;
            font-size: 16px;
        }
        .note {
            font-size: 14px;
            color: #777;
            margin-bottom: 25px;
            line-height: 1.5;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 3px solid #FF8C00;
            border-radius: 5px;
        }
        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .quantity-btn {
            width: 36px;
            height: 36px;
            background-color: #f0f0f0;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .quantity-btn:hover {
            background-color: #e0e0e0;
            transform: scale(1.05);
        }
        .quantity {
            margin: 0 20px;
            font-weight: 500;
            font-size: 18px;
        }
        .buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }
        .back, .edit, .delete, .buy-button {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
        }
        .back {
            background-color: #f0f0f0;
            color: #333;
        }
        .back:hover {
            background-color: #e0e0e0;
        }
        .edit {
            background-color: #4CAF50;
            color: white;
        }
        .edit:hover {
            background-color: #3e8e41;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .delete {
            background-color: #f44336;
            color: white;
        }
        .delete:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .buy-button {
            background-color: #FF8C00;
            color: white;
            text-transform: uppercase;
            font-weight: 600;
            padding: 15px 30px;
            margin-top: 15px;
            letter-spacing: 1px;
            box-shadow: 0 4px 8px rgba(255,140,0,0.3);
        }
        .buy-button:hover {
            background-color: #e67e00;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(255,140,0,0.4);
        }
        .buy-button a {
            color: white;
            text-decoration: none;
        }
        
        /* Icon for buttons */
        .button-icon {
            margin-right: 8px;
        }
        
        /* Responsive */
        @media (max-width: 900px) {
            .product-container {
                flex-direction: column;
                padding: 25px;
            }
            
            .product-image {
                max-width: 100%;
                margin-bottom: 30px;
            }
            
            .buttons {
                flex-wrap: wrap;
            }
            
            .back, .edit, .delete {
                flex: 1;
                min-width: 120px;
            }
            
            .buy-button {
                width: 100%;
            }
        }
        
        @media (max-width: 600px) {
            .navigation {
                overflow-x: auto;
                justify-content: flex-start;
                padding: 15px;
            }
            
            .navigation a {
                margin: 0 15px;
                white-space: nowrap;
            }
            
            .category-dropdown {
                width: 150px;
                font-size: 14px;
            }
            
            .product-title {
                font-size: 26px;
            }
            
            .price {
                font-size: 24px;
            }
            
            .buttons {
                flex-direction: column;
            }
            
            .back, .edit, .delete {
                width: 100%;
            }
        }
    </style>
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
    <!-- Product Detail -->
    <div class="product-container">
        <div class="product-image">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="product-info">
            <h1 class="product-title">{{ $product->name }}</h1>
            <div class="ratings">
                ★★★★★
            </div>
            <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
            <p class="description">
                {{ $product->description }}
            </p>
            <p class="note">
                * Terdapat perbedaan harga menyesuaikan dengan lokasi cabang, harga terendah berlaku di cabang Pusat Jogja dan sekitarnya.
            </p>
            <div class="quantity-selector">
                <div class="quantity-btn">-</div>
                <div class="quantity">1</div>
                <div class="quantity-btn">+</div>
            </div>
            <div class="buttons">
                <a href="{{ route('admin.allproduk') }}" class="back">
                    <span class="button-icon">&#8592;</span> Kembali
                </a>
                <a href="{{ route('admin.edit', $product->id) }}" class="edit">
                    <span class="button-icon"></span> Edit
                </a>
                <form action="{{ route('admin.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete">
                        <span class="button-icon"></span> Hapus
                    </button>
                </form>
            </div>
            <button class="buy-button">
                <a href="{{ route('pesanan') }}">Pesan Sekarang</a>

            </button>
        </div>
    </div>
</body>
</html>