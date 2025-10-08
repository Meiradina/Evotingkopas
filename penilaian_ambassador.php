<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Change Ambassador - SEMI PERKA</title>
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

    <!-- Form Voting Change Ambassador -->
    <main class="voting-form-penilaian">
        <h2>Penilaian Change Ambassador</h2>
        <form method="POST" action="submit_change_ambassador.php">
        <?php
$namaAmbassador = [
    "M. Lail Kurniawan", "Yuki Khaerunnisa", "Eka P. Resbianti", 
    "Juharin M. Imawati", "Dewi Sulistiyawati", "Puguh P. Widodo", 
    "Sri Iriantiningsih", "M. Kurniawan", "Navy Yulianti N.", 
    "Annisa Rohmi", "Irawan", "Suryanto", "M.Agus Masrul", 
    "Sasono Widoyoko", "Anugrah Alief Pratama", "Khoirunnisa", "Yulifah Suryana", "Yuyun Nailufar"
];
?>

<!-- Pertanyaan 1 -->
<div class="question">
    <label for="ambassador_question_1">1. Siapakah menurut anda yang paling memberikan pengaruh perubahan budaya kerja positif di satuan kerja ini? (Manajemen Perubahan)</label>
    <select id="ambassador_question_1" name="question_1" required>
        <option value="" disabled selected>Pilih Ambassador</option>
        <?php foreach ($namaAmbassador as $nama): ?>
            <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Pertanyaan 2 -->
<div class="question">
    <label for="ambassador_question_2">2. Siapakah menurut anda yang paling memiliki pola kerja teratur di satuan kerja ini? (Manajemen Perubahan)</label>
    <select id="ambassador_question_2" name="question_2" required>
        <option value="" disabled selected>Pilih Ambassador</option>
        <?php foreach ($namaAmbassador as $nama): ?>
            <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Pertanyaan 3 -->
<div class="question">
    <label for="ambassador_question_3">3. Siapakah menurut anda yang paling mampu memberikan motivasi kerja tinggi di satuan kerja ini? (Manajemen Perubahan)</label>
    <select id="ambassador_question_3" name="question_3" required>
        <option value="" disabled selected>Pilih Ambassador</option>
        <?php foreach ($namaAmbassador as $nama): ?>
            <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Pertanyaan 4 -->
<div class="question">
    <label for="ambassador_question_4">4. Siapakah menurut anda yang paling mematuhi SOP dalam menyelesaikan pekerjaan di satuan kerja ini? (Penataan Tata Laksana)</label>
    <select id="ambassador_question_4" name="question_4" required>
        <option value="" disabled selected>Pilih Ambassador</option>
        <?php foreach ($namaAmbassador as $nama): ?>
            <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Pertanyaan 5 -->
<div class="question">
    <label for="ambassador_question_5">5. Siapakah menurut anda yang paling sering memberikan prestasi bagi satuan kerja ini? (Manajemen SDM)</label>
    <select id="ambassador_question_5" name="question_5" required>
        <option value="" disabled selected>Pilih Ambassador</option>
        <?php foreach ($namaAmbassador as $nama): ?>
            <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Pertanyaan 6 -->
<div class="question">
    <label for="ambassador_question_6">6. Siapakah menurut anda yang paling sering berbagi ilmu dan informasi bagi satuan kerja ini? (Manajemen SDM)</label>
    <select id="ambassador_question_6" name="question_6" required>
    <option value="" disabled selected>Pilih Ambassador</option>
                    <?php foreach ($namaAmbassador as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 7 -->
            <div class="question">
                <label for="ambassador_question_7">7. Siapakah menurut anda yang paling layak menjadi role model di satuan kerja ini? (Penguatan Akuntabilitas)</label>
                <select id="ambassador_question_7" name="question_7" required>
                    <option value="" disabled selected>Pilih Ambassador</option>
                    <?php foreach ($namaAmbassador as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 8 -->
            <div class="question">
                <label for="ambassador_question_8">8. Siapakah menurut anda yang paling mampu mengendalikan benturan kepentingan di satuan kerja ini? (Manajemen Pengawasan)</label>
                <select id="ambassador_question_8" name="question_8" required>
                    <option value="" disabled selected>Pilih Ambassador</option>
                    <?php foreach ($namaAmbassador as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 9 -->
            <div class="question">
                <label for="ambassador_question_9">9. Siapakah menurut anda yang paling memberikan inovasi pekerjaan bagi satuan kerja ini? (Pelayanan Prima)</label>
                <select id="ambassador_question_9" name="question_9" required>
                    <option value="" disabled selected>Pilih Ambassador</option>
                    <?php foreach ($namaAmbassador as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 10 -->
            <div class="question">
                <label for="ambassador_question_10">10. Siapakah menurut anda yang paling memberikan inovasi pelayanan bagi satuan kerja ini? (Pelayanan Prima)</label>
                <select id="ambassador_question_10" name="question_10" required>
                    <option value="" disabled selected>Pilih Ambassador</option>
                    <?php foreach ($namaAmbassador as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Informasi Pemilih -->
            <div class="voter-info">
                <label for="voter_name_ambassador">Nama Anda :</label>
                <input type="text" id="voter_name_ambassador" name="voter_name" placeholder="Nama Penilai" required>
            </div>

            <!-- Tombol Submit -->
            <div class="submit-button">
                <button type="submit">Kirim Penilaian</button>
            </div>
        </form>
    </main>
</body>
</html>
