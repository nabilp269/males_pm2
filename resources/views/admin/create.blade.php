<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<style>
    body {
    background-color: #e9f5e9;
    font-family: Arial, sans-serif;
}

.container {
    background: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #2e7d32;
}

.btn-primary {
    background-color: #2e7d32;
    border: none;
}

.btn-primary:hover {
    background-color: #256b28;
}

.form-control {
    border: 1px solid #2e7d32;
}

.form-control:focus {
    border-color: #256b28;
    box-shadow: 0 0 5px rgba(46, 125, 50, 0.5);
}

.alert-success {
    background-color: #c8e6c9;
    color: #256b28;
    border-color: #81c784;
}

</style>

<body>
    <div class="container mt-5">
        <h2>Tambah Produk</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Link Gambar Produk</label>
                <input type="url" class="form-control" id="image_url" name="image_url" placeholder="Masukkan URL gambar" required>
            </div>
            

            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>
</body>
</html>