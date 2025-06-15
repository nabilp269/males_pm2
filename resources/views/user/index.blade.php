@extends('layouts.app')

@section('content')

    <main>
        <div class="container">
            <div class="banner position-relative">
                <img src="https://img.freepik.com/premium-photo/various-kue-kering-cookies-lebaran-food-background_511235-11190.jpg"
                    alt="Promo Spesial Bulan Ini" class="img-fluid w-100">
                <div class="banner-text position-absolute bottom-0 start-0 text-white p-4">
                    <h1>Kue Kering Premium untuk Setiap Momen</h1>
                    <p>Kami hadir untuk memanjakan lidah Anda dengan kue kering berkualitas,
                        dibuat dari bahan pilihan dan diproses dengan standar higienis serta teknologi modern.</p>
                </div>
            </div>


            <h2>Best Products</h2>
            <div class="row">
                @foreach($bestProducts as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card" onclick="window.location.href='{{ route('user.detail', $product->id) }}'">
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-ribbon">Best Seller</div>
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
