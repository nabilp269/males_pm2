<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            text-align: center;
            padding: 20px;
        }

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 15px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        .back {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: white;
            background-color: #6c757d;
            padding: 10px;
            border-radius: 5px;
        }

        .back:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>

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
            <a href="{{ route('home') }}" class="back">Batal</a>
        </div>
    </div>

</body>
</html>
