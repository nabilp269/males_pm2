@extends('layouts.app')

@section('content')



    <main>

        <div class="container-kontak">
            <h2>Kontak Kami</h2>
            <p>Silakan isi formulir di bawah ini untuk menghubungi kami.</p>
            
            <form action="{{ route('user.kontak.send') }}" method="POST" class="form">
                @csrf
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
                
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                
                <label for="message" class="form-label">Pesan</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                
                <button type="submit" class="btn-primary">Kirim</button>
            </form>
        </div>
    </main>

@endsection