@extends('layouts.app')

@section('content')

    <!-- Product Detail -->
    <main>
        <div class="product-container">
            <div class="product-image">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="product-info">
                <h1 class="product-title">{{ $product->name }}</h1>
            
                <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                <p class="description">
                    {{ $product->description }}
                </p>
                </p>
                <p class="note">
                    * Terdapat perbedaan harga menyesuaikan dengan lokasi cabang, harga terendah berlaku di cabang Pusat Jogja dan sekitarnya.
                </p>
            
                <div class="buttons">
                    <a href="javascript:history.back()" class="back">
                        <span class="button-icon">&#8592;</span> Kembali
                    </a>
                </div>
                <button class="buy-button">
                    <a href="{{ route('user.checkout', $product->id) }}">Pesan Sekarang</a>
                </button>
            </div>
        </div>
    </main>


@endsection
