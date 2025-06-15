@extends('layouts2.app')

@section('admin')
    <div class="container mt-4">
        <h2>Riwayat Semua Pesanan</h2>

        @forelse($orders as $order)
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Order {{ $order->id }}</strong> |
                    <span>Nama: {{ $order->user->name ?? 'Unknown User' }}</span> |
                    <span>Tanggal: {{ $order->created_at->format('d-m-Y H:i') }}</span>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($order->orderItems as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->product->name }}</strong><br>
                                    Pesanan: {{ $item->quantity }}
                                </div>
                                <span>Total:
                                    <strong>Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</strong></span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-2">
                        <strong>Alamat Pengiriman:</strong><br>
                        {{ $order->alamat_pengiriman ?? 'Alamat tidak tersedia' }}
                    </div>

                    <div class="mt-2">
                        <strong>Bukti Pembayaran:</strong><br>
                            <a href="{{ asset($order->bukti_pembayaran) }}" target="_blank">
                                <img src="{{ asset($order->bukti_pembayaran) }}" alt="Bukti Pembayaran"
                                    style="max-width: 200px; max-height: 200px; border: 1px solid #ccc; border-radius: 8px;">
                            </a>
                    </div>

                    <div class="mt-2">
                        <strong>Status:</strong> {{ ucfirst($order->status ?? 'pending') }}

                        <!-- Jika admin, tampilkan tombol update -->
                        <form action="{{ route('admin.updateStatus', $order->id) }}" method="POST" class="d-inline-block ml-2">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="proses kemas">
                            <button type="submit" class="btn btn-sm btn-warning">Proses Kemas</button>
                        </form>

                        <form action="{{ route('admin.updateStatus', $order->id) }}" method="POST" class="d-inline-block ml-2">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="proses pengiriman">
                            <button type="submit" class="btn btn-sm btn-success">Proses Pengiriman</button>
                        </form>
                    </div>

                </div>
            </div>
        @empty
            <p>Tidak ada pesanan yang ditemukan.</p>
        @endforelse
    </div>
@endsection