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

<body>

    <div class="header">
        <div class="logo">
            <img src="https://img.freepik.com/premium-vector/vector-logo-cookies-crunchy-desserts_1121638-47.jpg?semt=ais_hybrid&w=740"
                alt="Logo Kue" class="logo-img">
        </div>
        <div class="">

        </div>
        <div class="icons">
            <a href="{{ route('user.history') }}">
                <div class="icon cart-icon">&#128722;</div>
            </a>
            <div class="icon profile-icon">&#128100;</div>
            <div class="icon instagram-icon">
                <!-- Instagram Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    style="color: #E1306C;">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
            </div>
            <div class="icon whatsapp-icon">
                <!-- WhatsApp Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    style="color: #25D366;">
                    <path
                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                    </path>
                </svg>
            </div>
        </div>
    </div>

    <div class="navigation">
        <div class="nav">
            <a href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <a href="{{ route('user.index') }}"><i class="fas fa-home"></i> Home</a>
            <a href="{{ route('user.allproduk') }}"><i class="fas fa-bread-slice"></i> Semua Produk</a>
            <a href="{{ route('user.tentang') }}"><i class="fas fa-info-circle"></i> Tentang Kami</a>
            <a href="{{ route('user.kontak') }}"><i class="fas fa-envelope"></i> Kontak</a>
        </div>
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
                <h2>Tentang Amazing Bread & Cake</h2>
                <p class="highlight">Roti & Kue Premium</p>
                <p>Amazing Bread & Cake adalah brand bakery lokal yang menghadirkan beragam pilihan roti dan kue
                    berkualitas tinggi. Kami menggunakan bahan-bahan pilihan dan proses yang higienis untuk menciptakan
                    produk yang tidak hanya lezat, tetapi juga aman dan layak dinikmati semua kalangan.</p>
                <p>Setiap produk kami dibuat dengan penuh cinta dan dedikasi, menghadirkan kehangatan dalam setiap
                    gigitan. Kami percaya bahwa roti dan kue bukan hanya makanan, tetapi bagian dari momen berharga
                    bersama keluarga dan orang terkasih.</p>
                <p>Kami terus berinovasi agar tetap relevan dengan selera pasar, tanpa melupakan cita rasa klasik yang
                    dicintai. Melalui layanan online maupun offline, kami berkomitmen memberikan yang terbaik kepada
                    pelanggan kami di mana pun berada.</p>

                <!-- Visi dan Misi (pakai yang sudah direvisi di atas) -->
                <div class="details">
                    <details>
                        <summary>VISI</summary>
                        <p>Menjadi brand roti dan kue lokal terpercaya yang digemari masyarakat Indonesia, dengan cita
                            rasa istimewa, tampilan menarik, dan layanan terbaik baik secara online maupun offline.</p>
                    </details>
                    <details>
                        <summary>MISI</summary>
                        <p>
                            - Menyediakan roti dan kue berkualitas tinggi dengan harga yang terjangkau.<br><br>
                            - Terus berinovasi dalam pengembangan rasa dan desain kemasan sesuai tren dan kebutuhan
                            konsumen.<br><br>
                            - Menjaga konsistensi dalam cita rasa, kebersihan produksi, dan pelayanan pelanggan.<br><br>
                            - Memberdayakan tenaga kerja lokal serta mendukung pertumbuhan UMKM dalam rantai
                            produksi.<br><br>
                            - Membangun kehadiran merek yang kuat melalui pemasaran digital dan pengalaman pelanggan
                            yang menyenangkan.
                        </p>
                    </details>
                </div>
            </div>

        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <div class="footer-logo">
                    <div class="footer-logo-icon">KB</div>
                    <div class="footer-logo-text">Amazing Bread & Cake</div>
                </div>
                <p class="footer-description">
                    Kami menyediakan berbagai pilihan roti dan kue dengan kualitas terbaik menggunakan bahan-bahan
                    pilihan. Nikmati produk bakery kami yang dibuat dengan cinta dan dedikasi.
                </p>
                <div class="social-media">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <div class="footer-links">
                <div class="footer-column">
                    <h4>Navigasi</h4>
                    <ul>
                        <li><a href="{{ route('user.index') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('user.allproduk') }}"><i class="fas fa-chevron-right"></i> Semua
                                Produk</a></li>
                        <li><a href="{{ route('user.tentang') }}"><i class="fas fa-chevron-right"></i> Tentang Kami</a>
                        </li>
                        <li><a href="{{ route('user.kontak') }}"><i class="fas fa-chevron-right"></i> Kontak</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Kategori</h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-bread-slice"></i> Roti</a></li>
                        <li><a href="#"><i class="fas fa-birthday-cake"></i> Kue Ulang Tahun</a></li>
                        <li><a href="#"><i class="fas fa-cookie"></i> Pastry</a></li>
                        <li><a href="#"><i class="fas fa-cookie-bite"></i> Kue Kering</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Kontak Kami</h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jl. Roti Enak No. 123, Jakarta</a></li>
                        <li><a href="#"><i class="fas fa-phone"></i> +62 812-3456-7890</a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> info@amazingbread.com</a></li>
                        <li><a href="#"><i class="fas fa-clock"></i> Buka 07:00 - 21:00</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 Amazing Bread & Cake. All Rights Reserved.</p>
        </div>
    </footer>

</body>

</html>