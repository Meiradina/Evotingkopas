<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian - SEMI PERKA</title>
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
      <li><a href="index.php">Beranda</a></li>
      <li><a href="dashboard.php">Rekap</a></li>
      <li><a href="profil.php">Profil</a></li>
      <li><a href="kategori_penilaian.php" class="active">Penilaian</a></li>
      <li><a href="result.php">Hasil</a></li>
    </ul>
  </div>
</nav>
    </header>

    <!-- Pilihan Kategori Voting -->
    <main class="voting-form">
        <h2>Pilih Kategori Penilaian</h2>
        <a href="penilaian_pegawai.php" class="btn">Pegawai Terbaik</a>
        <a href="penilaian_ambassador.php" class="btn">Change Ambassador</a>
    </main>
</body>
</html>
