<?php
include 'koneksi.php'; // Menyertakan file koneksi
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SEMI PERKA</title>
    <link rel="icon" href="assets/img/BPSlogo.png" type="image/png" sizes="32x32">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .card-konten-index,
    .card-konten-index.ambassador {
        width: 280px;       /* hanya ubah card, cukup kecil */
        margin: 15px auto;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
        text-align: center;
    }

    /* Khusus gambar dalam card */
    .card-konten-index img,
    .card-konten-index.ambassador img {
        max-width: 150px;   /* foto lebih kecil */
        height: auto;
        margin-bottom: 10px;
        border-radius: 8px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    /* Pastikan teks tetap jelas */
    .card-konten-index h3,
    .card-konten-index p {
        font-size: 14px; 
        color: #333;        /* jangan putih biar terlihat */
        margin: 5px 0;
    }
</style>
<body>
    <div class="background-image"></div>
    
<!-- Navbar -->
    <header>
    
<nav class="navbar">
  <div class="nav-container">
    <!-- Brand kiri -->
    <div class="brand">
      <img src="assets/img/BPSlogo.png" alt="Logo BPS" class="logo">
       <a href="index.php" class="brand-title">SEMI PERKA</a>
    </div>

    <!-- Menu kanan -->
<ul class="nav-links">
      <li><a href="index.php" class="active">Beranda</a></li>
      <li><a href="profil.php">Profil</a></li>
      <li><a href="kategori_penilaian.php">Penilaian</a></li>
      <li><a href="result.php">Hasil</a></li>
    </ul>
  </div>
</nav>
    </header>
    
    <!-- Konten -->
    <main class="content-beranda">
        <section class="welcome-section">
            <h1>Selamat Datang</h1>
            <p>Di website Penilaian Kinerja SEMI PERKA</p>
            <p>Sistem Monitoring Implementasi Berakhlak Kota Pasuruan</p>
        </section>
        <section class="side-by-side">
    <!-- Bagian Pegawai Terbaik -->
    <div class="form-group card-form">
        <h2>Pegawai Terbaik Berdasarkan Periode</h2>
        <div class="form-group">
    <select name="periode" id="periodePegawai" onchange="tampilkanHasil()" required>
    <option value="" disabled selected>Pilih Periode</option>
    <option value="Triwulan3-2024">Triwulan 3 2024</option>
    <option value="Triwulan4-2024">Triwulan 4 2024</option>
    <option value="Triwulan2-2024">Triwulan 2 2024</option>
    <option value="Triwulan1-2025">Triwulan 1 2025</option>
    <option value="Triwulan2-2025">Triwulan 2 2025</option>
    <option value="Triwulan3-2025">Triwulan 3 2025</option>
    <option value="Triwulan4-2025">Triwulan 4 2025</option>
    <option value="Triwulan1-2026">Triwulan 1 2026</option>
    <option value="Triwulan2-2026">Triwulan 2 2026</option>
    <option value="Triwulan3-2026">Triwulan 3 2026</option>
    <option value="Triwulan4-2026">Triwulan 4 2026</option>
</select>

    <!-- Pegawai Terbaik (Hasil Voting) -->
    <div id="Triwulan1-2025"  class="card-konten-index" style="display:none;" >
        <h3>Pegawai Terbaik Triwulan I 2025</h3>
        <img src="assets/img/profil/Muhammad Kurniawan, S.Si.png" alt="Pegawai Terbaik">
        <p><strong>Nama:</strong>Muhammad Kurniawan, S.Si</p>
        <p><strong>Jabatan:</strong>Statistisi Ahli Muda</p>
        <p><strong>Skor Penilaian:</strong> 64</p>
    </div>
            
    <!-- Pegawai Terbaik (Hasil Voting) -->
    <div id="Triwulan4-2024" class="card-konten-index" style="display:none;" >
        <h3>Pegawai Terbaik Triwulan IV 2024</h3>
        <img src="assets/img/profil/Muhammad Kurniawan, S.Si.png" alt="Pegawai Terbaik">
        <p><strong>Nama:</strong>Muhammad Kurniawan, S.Si</p>
        <p><strong>Jabatan:</strong>Statistisi Ahli Muda</p>
        <p><strong>Skor Penilaian:</strong> 35</p>
    </div>
            
    <!-- Pegawai Terbaik (Hasil Voting) -->
    <div id="Triwulan3-2024"  class="card-konten-index"style="display:none;" >
        <h3>Pegawai Terbaik Triwulan III 2024</h3>
        <img src="assets/img/profil/Muhammad Kurniawan, S.Si.png" alt="Pegawai Terbaik">
        <p><strong>Nama:</strong>Muhammad Kurniawan, S.Si</p>
        <p><strong>Jabatan:</strong>Statistisi Ahli Muda</p>
        <p><strong>Skor Penilaian:</strong> 39</p>
    </div>
    
    <!-- Pegawai Terbaik (Periode Sebelumnya) -->
    <div id="Triwulan2-2024" class="card-konten-index" style="display:none;" >
        <h3>Pegawai Terbaik Triwulan II 2024</h3>
        <img src="assets/img/profil/Muhammad Kurniawan, S.Si.png" alt="Pegawai Terbaik Periode Sebelumnya">
        <p><strong>Nama:</strong>Muhammad Kurniawan, S.Si</p>
        <p><strong>Jabatan:</strong>Statistisi Ahli Muda</p>
        <p><strong>Skor Penilaian:</strong> N/A (Belum menggunakan SEMI PERKA)</p>
    </div>


  </div>
    <section class="search-results">
        <h2></h2>
        <div class="results-container" id="resultsContainerPegawai"></div>
    </section>
</div>
    <!-- Bagian Ambassador Terbaik -->
    <div class="section-item card-form">
        <h2>Ambasador Terbaik Berdasarkan Periode</h2>
        <div class="form-group">
            <select name="periode" id="periodeAmbassador"onchange="tampilkanAmbassador()" required>
                <option value="" disabled selected>Pilih Periode</option>
    <option value="Ambassador2024">2024</option>
    <option value="Ambassador2025">2025</option>
    <option value="Ambassador2026">2026</option>
    </select>
        <!-- Change Ambassador (Hasil Voting) -->
    <div id="Ambassador2025"  class="card-konten-index ambassador" style="display:none;">
        <h3>Change Ambassador 2025</h3>
        <img src="assets/img/profil/Navy Yulianti Nukuhehe, S.Si.png" alt="Change Ambassador">
        <p><strong>Nama:</strong>Navy Yulianti Nukuhehe, S.Si</p>
        <p><strong>Jabatan:</strong>Statistisi Ahli Muda</p>
        <p><strong>Skor Penilaian:</strong> 39</p>
    </div>
    
    <!-- Change Ambassador (Periode Sebelumnya) -->
    <div id="Ambassador2024"  class="card-konten-index ambassador" style="display:none;">
        <h3>Change Ambassador 2024</h3>
        <img src="assets/img/profil/Navy Yulianti Nukuhehe, S.Si.png" alt="Change Ambassador Periode Sebelumnya">
        <p><strong>Nama:</strong>Navy Yulianti Nukuhehe, S.Si</p>
        <p><strong>Jabatan:</strong>Statistisi Ahli Muda</p>
        <p><strong>Skor Penilaian:</strong> N/A (Belum menggunakan SEMI PERKA)</p>
    </div>

        </div>
        <section class="search-results">
            <h2></h2>
            <div class="results-container" id="resultsContainerAmbassador">
                <!-- Hasil pencarian ambasador -->
        </section>
    </div>
</section>
<script>
function tampilkanHasil() {
    // ambil nilai yang dipilih user di dropdown
    var periode = document.getElementById("periodePegawai").value;

    // sembunyikan semua card pegawai
    var allCards = document.querySelectorAll(".card-konten-index");
    allCards.forEach(card => {
        card.style.display = "none";
    });

    // tampilkan hanya card yang sesuai
    if (periode) {
        var target = document.getElementById(periode);
        if (target) {
            target.style.display = "block";
        }
    }
}

function tampilkanAmbassador() {
    var periode = document.getElementById("periodeAmbassador").value;

    // sembunyikan semua card ambassador
    var allCards = document.querySelectorAll(".card-konten-index.ambassador");
    allCards.forEach(card => {
        card.style.display = "none";
    });

    // tampilkan hanya card sesuai pilihan
    if (periode) {
        var target = document.getElementById(periode);
        if (target) target.style.display = "block";
    }
}
</script>


    </main>
</body>
<!-- <footer class="footer">
        <p>Hak Cipta &copy; Badan Pusat Statistik 2024. Aplikasi SEMI PERKA.</p>
    </footer> -->
</html>