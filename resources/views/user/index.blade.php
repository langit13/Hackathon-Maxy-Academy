<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Aspirasi Pengaduan Online Masyarakat</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homeuser.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Basic Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #004085;
            color: white;
        }

        .navbar-custom {
            background-color: #003366;
            padding: 0.5rem 1rem;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
        }

        .navbar-nav .nav-link:hover {
            color: #d1e7ff !important;
        }

        .btn-outline-light, .btn-light {
            font-weight: bold;
        }

           /* Styling Profile Section with Enhanced Look */
           .profile-section {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        .profile-section .dropdown {
            position: relative;
            display: inline-block;
        }

        .profile-section .dropdown-toggle {
            position: relative;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid transparent;
            background: linear-gradient(45deg, #0056b3, #00aaff);
            padding: 2px;
            transition: transform 0.3s ease-in-out;
        }

        /* Adding Profile Image Styles */
        .profile-section .dropdown-toggle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            transition: opacity 0.3s ease;
        }

        /* Hover Effect on Profile Picture */
        .profile-section .dropdown-toggle:hover {
            transform: scale(1.1);
        }

        .profile-section .dropdown-toggle img:hover {
            opacity: 0.9;
        }

        /* Dropdown Styling */
        .profile-section .dropdown-menu {
            display: none;
            position: absolute;
            top: 70px;
            right: 0;
            background-color: #fff;
            min-width: 180px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            z-index: 1;
            overflow: hidden;
        }

        .profile-section .dropdown-item {
            padding: 12px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .profile-section .dropdown-item:hover {
            background-color: #e0e0e0;
        }

        /* Profile Info Display */
        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            color: #fff;
        }

        .profile-info .name {
            color: white;
            font-weight: bold;
            font-size: 1.1em;
        }

        .profile-info .role {
            font-size: 0.9em;
            color: #00aaff;
        }

        /* Enhanced Hover for Profile Dropdown */
        .profile-section:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<header class="navbar-custom">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;">
            </a>
            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links and Profile Dropdown -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentangKami') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan') }}">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dataLaporan') }}">Data Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        <!-- Enhanced Profile Section with Dropdown -->
        <div class="profile-section collapse navbar-collapse justify-content-end" id="navbarNav">
            <!-- Profile Info -->
            <div class="profile-info">
                <span class="name">{{ Auth::user()->name }}</span>
            </div>
            <div class="dropdown">
                <button class="dropdown-toggle" onclick="toggleDropdown()">
                    <img src="{{ asset('images/image 113.png') }}" alt="Profile">
                </button>
                <ul class="dropdown-menu" id="profileDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
    </div>
</header>
    <!-- Main Content -->
    <section class="main py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4">
                    <h2 class="text-white">Layanan Aspirasi Pengaduan Online Masyarakat</h2>
                    <p class="text-white-50">Platform digital inovatif yang memberdayakan masyarakat Indonesia untuk berpartisipasi aktif dalam pembangunan daerah mereka. Melalui platform ini, masyarakat dapat melaporkan berbagai masalah yang mereka temui di lingkungan sekitar, mulai dari jalan rusak, sampah menumpuk, hingga fasilitas publik yang tidak berfungsi dengan baik.</p>
                    <button class="btn btn-light btn-lg mt-3">Buat Laporan</button>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/hero-bg 1.png') }}" alt="Ilustrasi Layanan" style="max-width: 70%; height: auto;">
                </div>
            </div>
        </div>
       <div class="col-md-6 col-12 text-center">
    <div class="text-center my-4 py-3 bg-light rounded shadow-sm">
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-4">
            <img src="{{ asset('images/New_Bloomberg_Logo.png') }}" alt="Bloomberg" class="mx-2 mb-2" style="height: 30px;">
            <img src="{{ asset('images/cnbc africa.png') }}" alt="CNBC" class="mx-2 mb-2" style="height: 30px;">
            <img src="{{ asset('images/Forbes_logo.png') }}" alt="Forbes" class="mx-2 mb-2" style="height: 30px;">
            <img src="{{ asset('images/TechCrunch_logo.png') }}" alt="TechCrunch" class="mx-2 mb-2" style="height: 30px;">
        </div>
    </div>
</div>

    </section>

    <!-- About Section (Tentang Kami) -->
    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-4">Tentang Kami</h3>
                    <p>LAPOR bertujuan untuk meningkatkan transparansi, akuntabilitas, dan responsivitas pemerintah terhadap kebutuhan dan aspirasi publik.</p>
                    <img src="{{ asset('images/image 113.png') }}" alt="Tentang Kami Image" class="img-fluid mt-3" style="max-width: 100%; height: auto;">
                </div>
                <div class="col-md-6">
                    <div class="info-card mb-3 p-3 shadow-sm">
                        <h5><span class="mr-2">✏️</span>Tulis Laporan</h5>
                        <p>Laporkan keluhan atau aspirasi Anda dengan jelas dan lengkap.</p>
                    </div>
                    <div class="info-card mb-3 p-3 shadow-sm">
                        <h5><span class="mr-2">📋</span>Proses Verifikasi</h5>
                        <p>Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang.</p>
                    </div>
                    <div class="info-card mb-3 p-3 shadow-sm">
                        <h5><span class="mr-2">📌</span>Proses Tindak Lanjut</h5>
                        <p>Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda.</p>
                    </div>
                    <div class="info-card mb-3 p-3 shadow-sm">
                        <h5><span class="mr-2">💬</span>Beri Tanggapan</h5>
                        <p>Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari.</p>
                    </div>
                    <div class="info-card p-3 shadow-sm">
                        <h5><span class="mr-2">✅</span>Selesai</h5>
                        <p>Laporan Anda akan terus ditindaklanjuti hingga terselesaikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Jumlah Laporan Sekarang -->
    <section class="report-count py-5 text-center">
        <div class="container">
            <h4 class="text-white">JUMLAH LAPORAN SEKARANG</h4>
            <h1 class="text-white display-3 font-weight-bold">{{ $reportCount }}</h1>
        </div>
    </section>

    <!-- Section: Instansi Terhubung -->
    <section class="connected-institutions py-5 text-center">
        <div class="container">
            <h4 class="text-primary font-weight-bold mb-5">INSTANSI TERHUBUNG</h4>
            <div class="row justify-content-center">
                <div class="col-2">
                    <h3 class="font-weight-bold">100</h3>
                    <p>Kementrian</p>
                </div>
                <div class="col-2">
                    <h3 class="font-weight-bold">80</h3>
                    <p>Lembaga</p>
                </div>
                <div class="col-2">
                    <h3 class="font-weight-bold">73</h3>
                    <p>Pemkab</p>
                </div>
                <div class="col-2">
                    <h3 class="font-weight-bold">100</h3>
                    <p>Pemkot</p>
                </div>
                <div class="col-2">
                    <h3 class="font-weight-bold">90</h3>
                    <p>Pemprov</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-4 text-white">
        <div class="container">
            <div class="row">
                <!-- Logo and Newsletter Subscription -->
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3 font-weight-bold">INTcash</h5>
                    <p>Ikuti berita terbaru dari kami</p>
                    <form class="d-flex">
                        <input type="email" class="form-control mr-2" placeholder="Email">
                        <button class="btn btn-light">➤</button>
                    </form>
                </div>
                <!-- Footer Links -->
                <div class="col-md-2 mb-4">
                    <h5 class="mb-3 font-weight-bold">About</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50">Our Story</a></li>
                        <li><a href="#" class="text-white-50">Benefits</a></li>
                        <li><a href="#" class="text-white-50">Team</a></li>
                        <li><a href="#" class="text-white-50">Careers</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="mb-3 font-weight-bold">Help</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50">FAQs</a></li>
                        <li><a href="#" class="text-white-50">Contact Us</a></li>
                    </ul>
                </div>
                <!-- Social Media Links -->
                <div class="col-md-4 mb-4 d-flex justify-content-center align-items-center">
                    <a href="#" class="text-white-50 mx-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white-50 mx-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white-50 mx-2"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="row text-center mt-3">
                <div class="col-md-12">
                    <p class="text-white-50">© 2024 LaporPak. All rights reserved.</p>
                    <a href="#" class="text-white-50 mx-2">Terms & Conditions</a>
                    <a href="#" class="text-white-50 mx-2">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("profileDropdown");
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }

        // Hide dropdown if user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-toggle img')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === "block") {
                        openDropdown.style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
