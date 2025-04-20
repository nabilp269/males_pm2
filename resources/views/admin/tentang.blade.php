<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

</head>

<body class="bg-gray-100">

    <div class="header">
        <div class="logo">KB</div>
        <div class="category-dropdown">
            Kategori
            <span>&#9662;</span>
        </div>
        <div class="icons">
            <div class="icon cart-icon">&#128722;</div>
            <div class="icon profile-icon">&#128100;</div>
            <div class="icon instagram-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #E1306C;">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
            </div>
            <div class="icon whatsapp-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #25D366;">
                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="navigation">
        <div class="nav">
            <a href="{{ route('login') }}">LogOut</a>
            <a href="{{ route('admin.index') }}">Home</a>
            <a href="{{ route('admin.allproduk') }}">All Produk</a>
            <a href="{{ route('admin.tentang') }}">Tentang kami</a>
            <a href="{{ route('admin.kontak') }}">Kontak</a>
        </div>
    </div>

<div class="container mx-auto px-4 py-8 ">

    <div class="bg-yellow-200 p-6 rounded-lg shadow-md text-center">
        <h1 class="text-3xl font-bold">TENTANG KAMI</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 bg-white p-6 rounded-lg shadow-lg">
        <div>
            <img src="https://cdn.linkumkm.id/library/1/2/0/6/1/2/120612_840x576.jpg" alt="Tentang Kami" class="">
        </div>
        <div>
            <h2 class="text-xl font-bold text-orange-600">Sejarah Kue Basah</h2>
            <p class="text-gray-600">Kue basah</p>
            <p class="mt-4 text-gray-800">
                Kue Basah adalah jenis kue tradisional Indonesia yang memiliki tekstur lembut, moist (basah), dan biasanya tidak tahan lama karena tidak menggunakan pengawet. Kue ini sering disajikan dalam berbagai acara, seperti arisan, syukuran, atau sebagai camilan sehari-hari. Kue basah umumnya terbuat dari bahan-bahan alami seperti tepung beras, tepung ketan, santan, gula, dan daun pandan untuk aroma.
            </p>
            <p class="mt-2 text-gray-800">
                <strong>Ciri-ciri Kue Basah:</strong><br>
                - Tekstur Lembut dan Basah: Karena menggunakan santan atau bahan lain yang membuatnya tetap lembab.<br>
                - Tidak Tahan Lama: Biasanya hanya bertahan 1-2 hari karena tidak menggunakan pengawet.<br>
                - Rasa Manis atau Gurih: Ada yang manis seperti kue lapis atau kue cucur, dan ada juga yang gurih seperti nagasari atau lemper.
            </p>    
            <div class="mt-4">
                <details class="bg-gray-100 p-4 rounded-md mb-2">
                    <summary class="font-bold cursor-pointer">VISI</summary>
                    <p class="mt-2 text-gray-800">Menjadi toko Kue basah pilihan utama di Indonesia.</p>
                </details>
                <details class="bg-gray-100 p-4 rounded-md">
                    <summary class="font-bold cursor-pointer">MISI</summary>
                    <p class="mt-2 text-gray-800">Menyediakan Kue basah berkualitas dengan harga terjangkau dan pelayanan terbaik.</p>
                </details>
            </div>
        </div>
    </div>
</div>

</body>
</html>
