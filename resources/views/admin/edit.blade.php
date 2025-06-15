@extends('layouts2.app')

@section('admin')


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

@endsection