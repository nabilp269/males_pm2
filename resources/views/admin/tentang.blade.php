<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body >

    <div class="header">
        <div class="logo">
            <img src="https://img.freepik.com/premium-vector/vector-logo-cookies-crunchy-desserts_1121638-47.jpg?semt=ais_hybrid&w=740" alt="Promo Spesial Bulan Ini">
        </div>
        
        <div class="category-dropdown">
            Kategori
            <span>&#9662;</span>
        </div>
        <div class="icons">
            <div class="icon cart-icon">&#128722;</div>
            <div class="icon profile-icon">&#128100;</div>
            <div class="icon instagram-icon">
                <!-- Instagram Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #E1306C;">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
            </div>
            <div class="icon whatsapp-icon">
                <!-- WhatsApp Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #25D366;">
                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="navigation">
        <div class="nav">
            <a href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <a href="{{ route('admin.index') }}"><i class="fas fa-home"></i> Home</a>
            <a href="{{ route('admin.allproduk') }}"><i class="fas fa-bread-slice"></i> Semua Produk</a>
            <a href="{{ route('admin.tentang') }}"><i class="fas fa-info-circle"></i> Tentang Kami</a>
            <a href="{{ route('admin.kontak') }}"><i class="fas fa-envelope"></i> Kontak</a></div>
            <a href="{{ route('admin.create') }}"><i class="fas fa-plus-circle"></i> Tambah Produk</a>
    </div>

    <div class="container-tentang">
        <div class="section-title">
            <h1>TENTANG KAMI</h1>
        </div>

        <div class="about-section">
            <div class="about-image">
                <img src="https://cdn.linkumkm.id/library/1/2/0/6/1/2/120612_840x576.jpg" alt="Tentang Kami">
            </div>
            <div class="about-content">
                <h2>Sejarah Kue Basah</h2>
                <p class="highlight">Kue basah</p>
                <p>Kue Basah adalah jenis kue tradisional Indonesia yang memiliki tekstur lembut, moist (basah), dan biasanya tidak tahan lama karena tidak menggunakan pengawet. Kue ini sering disajikan dalam berbagai acara, seperti arisan, syukuran, atau sebagai camilan sehari-hari. Kue basah umumnya terbuat dari bahan-bahan alami seperti tepung beras, tepung ketan, santan, gula, dan daun pandan untuk aroma.</p>
                <p><strong>Ciri-ciri Kue Basah:</strong><br>
                    - Tekstur Lembut dan Basah<br>
                    - Tidak Tahan Lama<br>
                    - Rasa Manis atau Gurih
                </p>
                <div class="details">
                    <details>
                        <summary>VISI</summary>
                        <p>Menjadi toko Kue basah pilihan utama di Indonesia.</p>
                    </details>
                    <details>
                        <summary>MISI</summary>
                        <p>Menyediakan Kue basah berkualitas dengan harga terjangkau dan pelayanan terbaik.</p>
                    </details>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <p>&copy; 2025 All Amazing Bread & Cake. All Rights Reserved.</p>
            <div class="social-media">
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Twitter</a>
            </div>
        </div>
    </footer>

</body>
</html>
