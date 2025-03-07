<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            text-align: center;
        }

        .product-detail {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-detail img {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .product-detail h2 {
            margin: 10px 0;
            font-size: 26px;
            color: #333;
        }

        .product-detail p {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
        }

        .product-detail .price {
            font-size: 24px;
            font-weight: bold;
            color: #000;
            margin: 15px 0;
        }

        .buttons {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .buttons a,
        .buttons form button {
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 6px;
            font-weight: bold;
            display: inline-block;
            transition: 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .buy-now {
            background-color: #ff5733;
            color: white;
        }

        .back {
            background-color: #6c757d;
            color: white;
        }

        .edit {
            background-color: #007bff;
            color: white;
        }

        .delete {
            background-color: #dc3545;
            color: white;
        }

        .buy-now:hover {
            background-color: #e64a19;
        }

        .back:hover {
            background-color: #495057;
        }

        .edit:hover {
            background-color: #0056b3;
        }

        .delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="product-detail">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            
            <div class="buttons">
                <a href="{{ route('home') }}" class="back">Kembali</a>
                <a href="#" class="buy-now">Beli Sekarang</a>
                <a href="{{ route('admin.edit', $product->id) }}" class="edit">Edit</a>
                <form action="{{ route('admin.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete">Hapus</button>
                </form>
            </div>
        </div>      
    </div>
</body>
</html> 