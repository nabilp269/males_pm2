<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

    <style>
        /* Reset gaya default */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Gaya untuk header dan navigasi */
.header {
    background-color: #ffcc00;
    padding: 10px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.nav {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.nav a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background 0.3s ease-in-out;
}

.nav a:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

/* Gaya untuk tombol Home */
.button-home {
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 16px;
    text-decoration: none;
    font-weight: bold;
    transition: background 0.3s ease-in-out;
}

.button-home:hover {
    background-color: #0056b3;
}

/* Gaya untuk kontainer utama */
.container {
    max-width: 1100px;
    margin: auto;
    padding: 20px;
}

/* Gaya untuk bagian tentang kami */
.bg-yellow-200 {
    background-color: #ffeeba;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
}

/* Gaya untuk grid layout */
.grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

/* Responsif untuk layar lebih besar */
@media (min-width: 768px) {
    .grid {
        grid-template-columns: 1fr 1fr;
    }
}

/* Gaya untuk gambar */
.grid img {
    width: 100%;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Gaya untuk details (visi dan misi) */
details {
    background: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

details summary {
    font-weight: bold;
    cursor: pointer;
}

    </style>

<body class="bg-gray-100">
    
    <div class="header">
        <div class="nav">
            <a href="{{ route('admin.index') }}">Home</a>
            <a href="{{ route('admin.allproduk') }}">All Produk</a>
            <a href="{{ route('admin.tentang') }}">Tentang kami</a>
            <a href="{{ route('admin.kontak') }}">Kontak</a>
            <a href="{{ route('admin.create') }}">Tambah Product</a>
        </div>

<div class="container mx-auto px-4 py-8">

    <div class="bg-yellow-200 p-6 rounded-lg shadow-md text-center">
        <h1 class="text-3xl font-bold">TENTANG KAMI</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 bg-white p-6 rounded-lg shadow-lg">
        <div>
            <img src="https://cdn.linkumkm.id/library/1/2/0/6/1/2/120612_840x576.jpg" alt="Tentang Kami" class="w-full rounded-lg shadow-md">
        </div>
        <div>
            <h2 class="text-xl font-bold text-orange-600">SEJARAH Kue Basah</h2>
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
