@extends('layouts.app')

@section('content')

    <main>
        <div class="container mt-4">
            
                    <!-- Search & Filter -->
        <form method="GET" action="{{ route('user.allproduk') }}">
            <div class="row mb-4">
                <div class="search-bar">
                    <input type="text" name="search" class="search-input" placeholder="Cari produk..." value="{{ request('search') }}">
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
                <div class="filter-section">
                    <h3 class="filter-title">Filter Produk:</h3>
                    <div class="filter-options">
                     @php
                        $kategori = request('kategori');
                    @endphp
                    <a href="{{ route('user.allproduk', ['kategori' => null, 'search' => request('search')]) }}" class="btn {{ !$kategori ? 'filter-btn active' : 'filter-btn' }}">Semua</a>
                    <a href="{{ route('user.allproduk', ['kategori' => 'Roti', 'search' => request('search')]) }}" class="btn {{ $kategori == 'Roti' ? 'filter-btn active' : 'filter-btn' }}">Roti</a>
                    <a href="{{ route('user.allproduk', ['kategori' => 'Kue', 'search' => request('search')]) }}" class="btn {{ $kategori == 'Kue' ? 'filter-btn active' : 'filter-btn' }}">Kue</a>
                    <a href="{{ route('user.allproduk', ['kategori' => 'Pastry', 'search' => request('search')]) }}" class="btn {{ $kategori == 'Pastry' ? 'filter-btn active' : 'filter-btn' }}">Pastry</a>
                    <a href="{{ route('user.allproduk', ['kategori' => 'Donat', 'search' => request('search')]) }}" class="btn {{ $kategori == 'Donat' ? 'filter-btn active' : 'filter-btn' }}">Donat</a>
                    <a href="{{ route('user.allproduk', ['kategori' => 'Special', 'search' => request('search')]) }}" class="btn {{ $kategori == 'Special' ? 'filter-btn active' : 'filter-btn' }}">Special</a>
    
                    </div>
                </div>
            </div>
        </form>

            

            <h2 class="mb-4">All Products</h2>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card" onclick="window.location.href='{{ route('user.detail', $product->id) }}'">
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                                @if(in_array($product->id, $bestSellerIDs))
                                    <div class="card-ribbon">Best Seller</div>
                                @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text"><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    
@endsection
