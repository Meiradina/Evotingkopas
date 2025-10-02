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
    <select name="periode" id="periodePegawai" onchange="location.href=this.value" required>
    <option value="" disabled selected>Pilih Periode</option>
    <option value="Triwulan 3 2024">Triwulan 3 2024</option>
    <option value="Triwulan 4 2024">Triwulan 4 2024</option>
    <option value="Triwulan 1 2025">Triwulan 1 2025</option>
    <option value="Triwulan 2 2025">Triwulan 2 2025</option>
    <option value="Triwulan 3 2025">Triwulan 3 2025</option>
    <option value="Triwulan 4 2025">Triwulan 4 2025</option>
    <option value="Triwulan 1 2026">Triwulan 1 2026</option>
    <option value="Triwulan 2 2026">Triwulan 2 2026</option>
    <option value="Triwulan 3 2026">Triwulan 3 2026</option>
    <option value="Triwulan 4 2026">Triwulan 4 2026</option>
</select>

<script>
document.getElementById("periodePegawai").addEventListener("change", function() {
    var periode = this.value;
    if (periode) {
        window.location.href = "result.php?periode=" + encodeURIComponent(periode);
    }
});
</script>

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
            <select name="periode" required>
                <option value="" disabled selected>Pilih Periode</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    </select>
        </div>
        <section class="search-results">
            <h2></h2>
            <div class="results-container" id="resultsContainerAmbassador">
                <!-- Hasil pencarian ambasador -->
        </section>
    </div>
</section>

    </main>
</body>
<!-- <footer class="footer">
        <p>Hak Cipta &copy; Badan Pusat Statistik 2024. Aplikasi SEMI PERKA.</p>
    </footer> -->
</html>