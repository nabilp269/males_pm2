@extends('layouts2.app')

@section('admin')


    <div class="container-kontak">
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

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan Harga Barang " required>

                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Masukkan Harga Barang " required>

                <label for="stok" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok') }}" placeholder="Masukkan Stok Barang " required>
                
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" class="form-control" >
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="Roti">Roti</option>
                    <option value="Kue">Kue</option>
                    <option value="Pastry">Pastry</option>
                    <option value="Donat">Donat</option>
                    <option value="Spesial">Spesial</option>
                </select>
                
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>

                <label for="image_url" class="form-label">Link Gambar Produk</label>
                <input type="url" class="form-control" id="image_url" name="image_url" value="{{ old('image_url') }}" placeholder="Masukkan URL gambar" required>

            <button type="submit" class="btn-primary">Tambah Produk</button>
            <a href="javascript:history.back()" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
    
@endsection