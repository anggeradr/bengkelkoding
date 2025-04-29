<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang - Sismenkes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar a, .navbar-brand {
            color: white !important;
        }
        .hero {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: white;
            padding: 100px 20px;
            text-align: center;
        }
        .section {
            padding: 80px 20px;
        }
        footer {
            background: #343a40;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top shadow">
    <div class="container">
        <a class="navbar-brand" href="#">Sismenkes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Fitur</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Analitik</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Testimoni</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
            </ul>
            <div class="d-flex">
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light me-2">Daftar</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1 class="display-4">Sistem Manajemen Kesehatan</h1>
        <p class="lead">Solusi Digital Untuk Pemeriksaan & Kesehatan Anda</p>
        <a href="{{ route('register') }}" class="btn btn-light text-primary mt-3">Mulai Sekarang</a>
    </div>
</section>

<!-- Sections -->
<section class="section bg-light text-center">
    <div class="container">
        <h2>Fitur Unggulan</h2>
        <p>Kemudahan akses, rekam medis digital, notifikasi pemeriksaan & banyak lagi.</p>
    </div>
</section>

<section class="section text-center">
    <div class="container">
        <h2>Analitik Kesehatan</h2>
        <p>Statistik kesehatan Anda secara real-time dan mudah dipahami.</p>
    </div>
</section>

<section class="section bg-light text-center">
    <div class="container">
        <h2>Testimoni</h2>
        <p>"Sismenkes sangat membantu dalam memantau kesehatan saya!" - Pasien A</p>
    </div>
</section>

<section class="section text-center">
    <div class="container">
        <h2>Kontak</h2>
        <p>Email: info@sismenkes.id | Telp: (021) 123-4567</p>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p>&copy; {{ date('Y') }} Sismenkes. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
