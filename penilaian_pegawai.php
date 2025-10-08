<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Pegawai Terbaik - SEMI PERKA</title>
    <link rel="icon" href="assets/img/BPSlogo.png" type="image/png" sizes="32x32">
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

    <!-- Form Voting Pegawai -->
    <main class="voting-form-penilaian">
        <h2>Penilaian Pegawai Terbaik</h2>
        <form method="POST" action="submit_voting.php">
        <?php
            $namaPegawai = [
                "M. Lail Kurniawan", "Yuki Khaerunnisa", "Eka P. Resbianti", 
                "Juharin M. Imawati", "Dewi Sulistiyawati", "Puguh P. Widodo", 
                "Sri Iriantiningsih", "M. Kurniawan", "Navy Yulianti N.", 
                "Annisa Rohmi", "Irawan", "Suryanto", "M.Agus Masrul", 
                "Sasono Widoyoko", "Anugrah Alief Pratama", "Khoirunnisa", "Yulifah Suryana", "Yuyun Nailufar"
            ];
            ?>

            <!-- Pertanyaan 1 -->
            <div class="question">
                <label for="pegawai_question_1">1. Siapakah menurut anda yang paling memberikan pelayanan kerja terbaik kepada sesama pegawai di satuan kerja ini? (Berorientasi Pelayanan)</label>
                <select id="pegawai_question_1" name="question_1" required>
                    <option value="" disabled selected>Pilih Pegawai</option>
                    <?php foreach ($namaPegawai as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 2 -->
            <div class="question">
                <label for="pegawai_question_2">2. Siapakah menurut anda yang paling memberikan pelayanan kerja terbaik kepada eksternal di satuan kerja ini? (Berorientasi Pelayanan)</label>
                <select id="pegawai_question_2" name="question_2" required>
                    <option value="" disabled selected>Pilih Pegawai</option>
                    <?php foreach ($namaPegawai as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 3 -->
            <div class="question">
                <label for="pegawai_question_3">3. Siapakah menurut anda yang paling disiplin di satuan kerja ini? (Akuntabel)</label>
                <select id="pegawai_question_3" name="question_3" required>
                    <option value="" disabled selected>Pilih Pegawai</option>
                    <?php foreach ($namaPegawai as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 4 -->
            <div class="question">
            <label for="pegawai_question_4">4. Siapakah menurut anda yang paling tinggi kinerjanya di satuan kerja ini? (Akuntabel)</label>
                <select id="pegawai_question_4" name="question_4" required>
                    <option value="" disabled selected>Pilih Pegawai</option>
                    <?php foreach ($namaPegawai as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 5 -->
            <div class="question">
                <label for="pegawai_question_5">5. Siapakah menurut anda yang paling kompeten dalam menyelesaikan tugasnya pada tim kerja di satuan kerja ini? (Kompeten)</label>
                <select id="pegawai_question_5" name="question_5" required>
                    <option value="" disabled selected>Pilih Pegawai</option>
                    <?php foreach ($namaPegawai as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 6 -->
            <div class="question">
                <label for="pegawai_question_6">6. Siapakah menurut anda yang paling luwes dalam bergaul di satuan kerja ini? (Harmonis)</label>
                <select id="pegawai_question_6" name="question_6" required>
                    <option value="" disabled selected>Pilih Pegawai</option>
                    <?php foreach ($namaPegawai as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 7 -->
            <div class="question">
                <label for="pegawai_question_7">7. Siapakah menurut anda yang paling loyal dalam mengikuti peraturan dan arahan pimpinan di satuan kerja ini? (Loyal)</label>
                <select id="pegawai_question_7" name="question_7" required>
                    <option value="" disabled selected>Pilih Pegawai</option>
                    <?php foreach ($namaPegawai as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 8 -->
            <div class="question">
                <label for="pegawai_question_8">8. Siapakah menurut anda yang paling rajin dalam mengembangkan kompetensi di satuan kerja ini? (Adaptif)</label>
                <select id="pegawai_question_8" name="question_8" required>
                    <option value="" disabled selected>Pilih Pegawai</option>
                    <?php foreach ($namaPegawai as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 9 -->
            <div class="question">
                <label for="pegawai_question_9">9. Siapakah menurut anda yang paling mudah diajak bekerjasama di satuan kerja ini? (Kolaboratif)</label>
                <select id="pegawai_question_9" name="question_9" required>
                    <option value="" disabled selected>Pilih Pegawai</option>
                    <?php foreach ($namaPegawai as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pertanyaan 10 -->
            <div class="question">
                <label for="pegawai_question_10">10. Siapakah menurut anda yang paling aktif berkoordinasi di satuan kerja ini? (Kolaboratif)</label>
                <select id="pegawai_question_10" name="question_10" required>
                    <option value="" disabled selected>Pilih Pegawai</option>
                    <?php foreach ($namaPegawai as $nama): ?>
                        <option value="<?= htmlspecialchars($nama) ?>"><?= htmlspecialchars($nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Informasi Pemilih -->
            <div class="voter-info">
                <label for="voter_name">Nama Anda :</label>
                <input type="text" id="voter_name" name="voter_name" placeholder="Nama Penilai" required>
                </div>

<!-- Tombol Submit -->
<div class="submit-button">
    <button type="submit">Kirim Penilaian</button>
</div>
</form>
                    </main>
</body>
</html>
