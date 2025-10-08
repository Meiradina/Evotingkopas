<?php
include 'koneksi.php';

// === Data  Berdasarkan Kekurangan jam Kerja 2025  ===
$Nama = [
    "Kepala BPS Kota Pasuruan",
    "Kepala Subbagian Umum",
    "Statistisi Penyelia",
    "Statistisi Ahli Muda ",
    "Statistisi Ahli Pertama ",
    "Analis Pengelola Keuangan Pertama",
    "Pranata Keuangan Mahir",
];

$jumlah = [1,1,6,8,1,1,1]; // jumlah pegawai sesuai jabatan

// === Data Pegawai Terbaik per Triwulan ===
$triwulan = ["Triwulan I 2024","Triwulan II 2024","Triwulan III 2024","Triwulan IV 2024"];
$skorPegawai = [64,0,39,35];

// === Data Change Ambassador per Tahun ===
$tahun = ["2024","2025"];
$skorAmbasador = [0,39];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"> <title>Dashboard - SEMI PERKA</title> <link rel="icon" href="assets/img/BPSlogo.png" type="image/png">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>

<body class="dashboard">
  <!-- Navbar -->
  <header>
    <nav class="navbar">
      <div class="nav-container">
        <div class="brand">
          <img src="assets/img/BPSlogo.png" alt="Logo BPS" class="logo">
          <a href="index.php" class="brand-title">SEMI PERKA</a>
        </div>

        <ul class="nav-links">
          <li><a href="index.php">Beranda</a></li>
          <li><a href="dashboard.php" class="active">Dashboard</a></li>
          <li><a href="profil.php">Profil</a></li>
          <li><a href="kategori_penilaian.php">Penilaian</a></li>
          <li><a href="result.php">Hasil</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Konten Utama -->
  <main class="container">
    <!-- Info Cards -->
    <div class="cards">
      <div class="card">
        <h3>Total Pegawai</h3>
        <p><?= array_sum($jumlah); ?></p>
      </div>
      <div class="card">
        <h3>Total Triwulan</h3>
        <p><?= count($triwulan); ?></p>
      </div>
      <div class="card">
        <h3>Total Ambassador</h3>
        <p><?= count($tahun); ?></p>
      </div>
    </div>
<!-- Pilihan Bulan -->
<div style="text-align:center; margin-bottom:15px;">
  <label><b>Pilih Bulan:</b></label>
  <select id="bulan" onchange="updateCharts()" style="padding:5px; border-radius:5px;">
    <option value="Jan">Januari</option>
    <option value="Feb">Februari</option>
    <option value="Mar">Maret</option>
    <option value="Apr">April</option>
    <option value="Mei">Mei</option>
    <option value="Jun">Juni</option>
    <option value="Jul">Juli</option>
    <option value="Agu">Agustus</option>
    <option value="Sep" selected>September</option>
  </select>
</div>

 <!-- Grafik Kekurangan Jam Kerja -->
  <div class="charts">
    <div class="chart-box">
      <h2>Jumlah Kekurangan Jam Kerja per Pegawai</h2>
      <canvas id="chartKekurangan"></canvas>
    </div>

    <!-- Grafik Penilaian Jam Kerja -->
    <div class="chart-box">
      <h2>Rekap Penilaian Jam Kerja per Pegawai</h2>
      <canvas id="chartPenilaian"></canvas>
    </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// === Label Pegawai (19 Nama Lengkap) ===
const pegawai = [
  "Imam Sudarmaji","Suryanto","Sri Iriantiningsih. P.W","Puguh Prijatno Widodo",
  "Irawan","Juharin Mufida Imawati","Yuyun Nailufar","Yuki Khaerunisa",
  "Sasono Widoyoko","Dewi Sulistiyawati","Yulifah Suryana","Mochammad Agus Masrul",
  "Mohammad Lail Kurniawan","Eka Prahara Resbiyanti","Annisa Rohmi","Muhammad Kurniawan",
  "Navy Yulianti Nukuhehe","Anugrah Alief Pratama","Khoirunnisa"
];

// === Data Kekurangan Jam Kerja (dummy contoh) ===
const dataKekurangan = {
  Jan: [0,30,0,0,14,0,0,0,49,0,0,0,0,0,0,0,0,9,0],
  Feb: [0,42,0,0,34,0,1,0,151,0,28,5,5,0,0,0,0,5,0],
  Mar: [0,186,0,0,1,0,0,16,1,0,0,0,0,39,0,0,0,0,0],
  Apr: [0,136,0,0,3,0,31,0,57,0,62,12,2,0,0,0,0,1,0],
  Mei: [0,115,0,0,94,0,76,0,25,0,26,0,0,0,0,0,0,2,0],
  Jun: [0,145,0,7,18,0,26,0,122,0,56,89,4,0,0,0,0,3,1],
  Jul: [0,89,0,0,44,0,49,15,83,0,122,1,6,40,0,0,0,1,2],
  Agu: [0,80,0,0,31,0,17,0,88,0,48,0,2,0,0,0,0,0,2],
  Sep: [0,43,28,0,59,0,2,4,1,0,59,,19,79,0,0,0,7,]
};

// === Inisialisasi Grafik 1: Kekurangan Jam Kerja ===
const ctxKekurangan = document.getElementById('chartKekurangan').getContext('2d');
let chartKekurangan = new Chart(ctxKekurangan, {
  type: 'bar',
  data: {
    labels: pegawai,
    datasets: [{
      label: 'Kekurangan Jam Kerja (Sep 2025)',
      data: dataKekurangan['Sep'],
      backgroundColor: 'rgba(54,162,235,0.7)',
      borderColor: 'rgba(54,162,235,1)',
      borderWidth: 1,
      borderRadius: 5
    }]
  },
  options: {
    responsive: true,
    scales: {
      x: { ticks: { maxRotation: 45, minRotation: 45 } },
      y: { beginAtZero: true, title: { display: true, text: 'Jumlah Jam' } }
    },
    plugins: {
      legend: { display: false },
      tooltip: { callbacks: { label: c => `${c.parsed.y} jam` } }
    },
    animation: { duration: 1200, easing: 'easeOutBounce' }
  }
});

// === Inisialisasi Grafik 2: Penilaian Jam Kerja ===
const pegawai2 = [
  "Suryanto","Anugrah Alief Pratama","Annisa Rohmi","Mochammad Agus Masrul","Khoirunnisa",
  "Irawan","Sasono Widoyoko","Yulifah Suryana","Navy Yulianti Nukuhehe",
  "Sri Iriantiningsih. P.W","Yuyun Nailufar","Dewi Sulistiyawati","Juharin Mufida Imawati",
  "Muhammad Kurniawan","Puguh Prijatno Widodo","Mohammad Lail Kurniawan",
  "Yuki Khaerunisa","Eka Prahara Resbiyanti"
];

// === Data Penilaian Jam Kerja (dummy contoh nilai 70–100) ===
const dataPenilaian = {
  Jan: [96.67,98.00,97.86,97.86,97.90,97.22,98.00,98.00,97.57,97.89,97.62,98.00,98.00,98.00,97.40,97.29,98.00,97.92],
  Feb: [97.00,98.00,98.00,98.00,98.00,97.17,98.00,98.00,98.00,97.47,98.00,98.00,98.00,97.38,98.00,97.71,97.86,97.92],
  Mar: [96.67,98.00,98.00,97.88,98.00,97.57,98.00,98.00,97.80,97.60,98.00,98.00,98.00,97.75,98.11,98.00,98.00,97.88],
  Apr: [92.41,93.00,92.73,92.94,93.29,93.07,93.00,93.15,93.00,93.15,92.79,92.86,93.00,92.86,93.00,93.00,93.15,93.15],
  Mei: [97.33,98.00,98.00,98.00,97.38,98.00,98.00,98.00,98.00,98.00,98.00,98.00,98.00,98.00,97.42,98.00,98.00,98.00],
  Jun: [97.60,98.00,98.00,98.00,98.00,97.57,97.89,98.00,98.00,98.07,97.92,98.00,98.00,98.00,98.00,98.00,98.00,98.00],
  Jul: [97.00,98.00,98.00,98.00,98.00,98.00,97.70,98.00,98.00,98.00,98.00,98.00,98.00,98.00,97.95,98.00,98.00,98.00],
  Agu: [96.75,98.00,97.70,98.00,98.00,98.00,97.67,98.00,98.00,98.08,98.00,98.00,98.00,98.00,98.00,98.00,98.00,98.00],
  Sep: [97.00,98.00,98.00,98.00,97.29,98.00,98.00,98.00,98.00,98.00,98.00,98.00,98.00,98.00,98.00,98.00,98.00,98.00]
};

const ctxPenilaian = document.getElementById('chartPenilaian').getContext('2d');
let chartPenilaian = new Chart(ctxPenilaian, {
  type: 'bar',
  data: {
    labels: pegawai2,
    datasets: [{
      label: 'Penilaian Jam Kerja (Sep 2025)',
      data: dataPenilaian['Sep'],
      backgroundColor: 'rgba(75,192,192,0.7)',
      borderColor: 'rgba(75,192,192,1)',
      borderWidth: 1,
      borderRadius: 5
    }]
  },
  options: {
    responsive: true,
    scales: {
      x: { ticks: { maxRotation: 45, minRotation: 45 } },
      y: { beginAtZero: true, title: { display: true, text: 'Nilai' } }
    },
    plugins: {
      legend: { display: false },
      tooltip: { callbacks: { label: c => `${c.parsed.y} poin` } }
    },
    animation: { duration: 1200, easing: 'easeOutBounce' }
  }
});

// === Fungsi Update Saat Ganti Bulan ===
function updateCharts() {
  const bulan = document.getElementById('bulan').value;
  chartKekurangan.data.datasets[0].data = dataKekurangan[bulan];
  chartKekurangan.data.datasets[0].label = `Kekurangan Jam Kerja (${bulan} 2025)`;
  chartKekurangan.update();

  chartPenilaian.data.datasets[0].data = dataPenilaian[bulan];
  chartPenilaian.data.datasets[0].label = `Penilaian Jam Kerja (${bulan} 2025)`;
  chartPenilaian.update();
}
</script>
    </div>
  </main>

  <div class="dashboard">
  <div class="dashboard-table-container">
    <h3>Rekap Kekurangan Jam Kerja per Bulan (Jan–Sep)</h3>
    <table class="dashboard-table">
      <thead>
      <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2">Jabatan</th>
        <!-- Judul utama untuk kolom bulan -->
        <th colspan="9">Bulan</th>
        <th rowspan="2">Total</th>
      </tr>
      <tr>
        <th>Januari</th>
        <th>Februari</th>
        <th>Maret</th>
        <th>April</th>
        <th>Mei</th>
        <th>Juni</th>
        <th>Juli</th>
        <th>Agustus</th>
        <th>September</th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Imam Sudarmaji</td>
          <td>Kepala BPS Kota Pasuruan</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
      <td><strong>0</strong></td>

        </tr>
      <tr>
          <td>2</td>
          <td>Suryanto</td>
          <td>Statistisi Penyelia</td>
          <td>30</td>
          <td>42</td>
          <td>186</td>
          <td>136</td>
          <td>115</td>
          <td>145</td>
          <td>89</td>
          <td>80</td>
          <td>43</td>
          <td><strong>866</strong></td>
        </tr>
        <tr>
        <td>3</td>
          <td>Sri Iriantiningsih. P.W</td>
          <td>Statistisi Ahli Muda</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>28</td>
          <td><strong>28</strong></td>
        </tr>
        <tr>
        <td>4</td>
          <td>Puguh Prijatno Widodo</td>
          <td>Statistisi Ahli Muda</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>7</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td><strong>7</strong></td>
        </tr>
        <tr>
        <td>5</td>
          <td>Irawan</td>
          <td>Statistisi Ahli Pertama</td>
          <td>14</td>
          <td>34</td>
          <td>1</td>
          <td>3</td>
          <td>94</td>
          <td>18</td>
          <td>44</td>
          <td>31</td>
          <td>59</td>
          <td><strong>298</strong></td>
        </tr>
        <tr>
        <td>6</td>
          <td>Juharin Mufida Imawati</td>
          <td>Statistisi Ahli Muda</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td><strong>0</strong></td>
        </tr>
        <tr>
        <td>7</td>
          <td>Yuyun Nailufar</td>
          <td>Statistisi Ahli Muda</td>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>31</td>
          <td>76</td>
          <td>26</td>
          <td>49</td>
          <td>17</td>
          <td>2</td>
          <td><strong>202</strong></td>
        </tr>
        <tr>
        <td>8</td>
          <td>Yuki Khaerunisa</td>
          <td>Analis Pengelola Keuangan Pertama</td>
          <td>0</td>
          <td>0</td>
          <td>16</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>15</td>
          <td>0</td>
          <td>4</td>
          <td><strong>35</strong></td>
        </tr>
        <td>9</td>
          <td>Sasono Widoyoko</td>
          <td>Statistisi Ahli Pertama </td>
          <td>49</td>
          <td>151</td>
          <td>1</td>
          <td>57</td>
          <td>25</td>
          <td>122</td>
          <td>83</td>
          <td>88</td>
          <td>1</td>
          <td><strong>723</strong></td>
        </tr>
        <td>10</td>
          <td>Dewi Sulistiyawati</td>
          <td>Statistisi Ahli Muda </td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td><strong>0</strong></td>
        </tr>       
         <td>11</td>
          <td>Yulifah Suryana</td>
          <td>Statistisi Ahli Pertama </td>
          <td>0</td>
          <td>28</td>
          <td>0</td>
          <td>62</td>
          <td>26</td>
          <td>56</td>
          <td>112</td>
          <td>48</td>
          <td>59</td>
          <td><strong>391</strong></td>
        </tr>
               <td>12</td>
          <td>Mochammad Agus Masrul</td>
          <td>Statistisi Ahli Pertama </td>
          <td>0</td>
          <td>5</td>
          <td>0</td>
          <td>12</td>
          <td>0</td>
          <td>89</td>
          <td>1</td>
          <td>0</td>
          <td>106</td>
          <td><strong>213</strong></td>
        </tr>
         <td>13</td>
          <td>Mohammad Lail Kurniawan</td>
          <td>Kepala Subbagian Umum</td>
          <td>0</td>
          <td>5</td>
          <td>0</td>
          <td>2</td>
          <td>0</td>
          <td>4</td>
          <td>6</td>
          <td>2</td>
          <td>0</td>
          <td><strong>19</strong></td>
        </tr>
         <td>14</td>
          <td>Eka Prahara Resbiyanti</td>
          <td>Pranata Keuangan Mahir</td>
          <td>0</td>
          <td>0</td>
          <td>39</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>40</td>
          <td>0</td>
          <td>0</td>
          <td><strong>79</strong></td>
        </tr>
         <td>15</td>
          <td>Annisa Rohmi</td>
          <td>Statistisi Ahli Pertama </td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td><strong>0</strong></td>
        </tr>
         <td>16</td>
          <td>Yulifah Suryana</td>
          <td>Statistisi Ahli Muda </td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td><strong>0</strong></td>
        </tr>
         <td>17</td>
          <td>Navy Yulianti Nukuhehe</td>
          <td>Statistisi Ahli Muda</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td><strong>0</strong></td>
        </tr>
         <td>18</td>
          <td>Anugrah Alief Pratama</td>
          <td>Statistisi Ahli Pertama </td>
          <td>9</td>
          <td>5</td>
          <td>0</td>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>1</td>
          <td>0</td>
          <td>7</td>
          <td><strong>28</strong></td>
        </tr>
         <td>19</td>
          <td>Khoirunnisa</td>
          <td>Statistisi Ahli Pertama </td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td>2</td>
          <td>2</td>
          <td>4</td>
          <td><strong>9</strong></td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

  
<!-- Tabel -->
  <div class="dashboard-table-container">
    <h2>Rekap Penilaian Kinerja 2025</h2>
    <table class="dashboard-table">
      <thead>
        <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2">Jabatan</th>
        <th colspan="9">Rata-rata Hasil Kerja</th>
      </tr>
      <tr>
        <th>Januari</th>
        <th>Februari</th>
        <th>Maret</th>
        <th>April</th>
        <th>Mei</th>
        <th>Juni</th>
        <th>Juli</th>
        <th>Agustus</th>
        <th>September</th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Suryanto</td>
          <td>Statistis Penyelia</td>
          <td>96.67</td>
          <td>97.00</td>
          <td>96.67</td>
          <td>92.41</td>
          <td>97.33</td>
          <td>97.60</td>
          <td>97.00</td>
          <td>96.75</td>
          <td>97.00</td>
        </tr>
        <tr>
          <td>2</td>
          <td>[340056815] Anugrah Alief Pratama S.Tr.Stat</td>
          <td>Statistis Ahli Pertama</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>93.07</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>3</td>
          <td>[340055734] Annisa Rohmi SST, M.Sc</td>
          <td>Statistis Ahli Pertama</td>
          <td>97.86</td>
          <td>98.00</td>
          <td>97.88</td>
          <td>93.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>4</td>
          <td>[340055115] Mochammad Agus Masrul A.Md., S.M.</td>
          <td>Statistis Ahli Pertama</td>
          <td>97.86</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>93.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>97.67</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>5</td>
          <td>[340059589] Khoirunnisa S.Tr.Stat.</td>
          <td>Statistis Ahli Pertama</td>
          <td>97.90</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>92.94</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>6</td>
          <td>[340013981] Irawan SE</td>
         <td>Statistis Ahli Pertama</td>
          <td>97.22</td>
          <td>97.17</td>
          <td>97.57</td>
          <td>92.73</td>
          <td>97.38</td>
          <td>97.57</td>
          <td>97.70</td>
          <td>97.70</td>
          <td>97.29</td>
        </tr>
        <tr>
          <td>7</td>
          <td>[340056242] Sasono Widoyoko SST</td>
          <td>Statistis Ahli Pertama</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>93.29</td>
          <td>98.00</td>
          <td>0</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>8</td>
          <td>[340051396] Yulifah Suryana SE., M.SE.</td>
          <td>Statistis Ahli Pertama</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>93.15</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>9</td>
          <td>[340056586] Navy Yuliani Nukushe S.Si</td>
          <td>Statistis Ahli Muda</td>
          <td>97.57</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>93.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>10</td>
          <td>[340013920] Sri Iriantiningsih P.W SE</td>
          <td>Statistis Ahli Muda</td>
          <td>97.89</td>
          <td>98.00</td>
          <td>97.80</td>
          <td>92.79</td> 
          <td>98.00</td>
          <td>97.09</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>11</td>
          <td>[340017712] Yuyun Nailufar SE</td>
          <td>Statistis Ahli Muda</td>
          <td>97.62</td>
          <td>97.47</td>
          <td>97.60</td>
          <td>92.86</td>
          <td>97.42</td>
          <td>98.00</td>
          <td>97.95</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>12</td>
          <td>[340051086] Dewi Sulistiyawati S.Si, M.Si</td>
          <td>Statistis Ahli Muda</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>93.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>13</td>
          <td>[340015983] Juharin Mufida Imawati SST</td>
          <td>Statistis Ahli Muda</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>93.00</td>
          <td>98.00</td>
          <td>98.07</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>14</td>
          <td>[340056113] Muhammad Kurniawan S.Si</td>
          <td>Statistis Ahli Muda</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.11</td>
          <td>93.15</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.08</td>
          <td>98.00</td>
        
        </tr>
        <tr>
          <td>15</td>
          <td>[340013936] Puguh Prijatno Widodo S,Si</td>
          <td>Statistis Ahli Muda</td>
          <td>97.40</td>
          <td>97.38</td>
          <td>97.75</td>
          <td>92.86</td>
          <td>98.00</td>
          <td>97.92</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>16</td>
          <td>[340055116] MOhammad Lail Kurniawan S.Si, M.M</td>
          <td>Kepala Subbagian Umum</td>
          <td>97.29</td>
          <td>97.71</td>
          <td>98.00</td>
          <td>93.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>17</td>
          <td>[340018460] Yuki Khaerunisa SE</td>
          <td>Analisis Pengelolaan Keuangan APBN Ahli Pertama</td>
          <td>98.00</td>
          <td>97.86</td>
          <td>98.00</td>
          <td>93.15</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
        <tr>
          <td>18</td>
          <td>[340055394] Eka Prahara Resbiyanti A.Md</td>
          <td>Pranata Keuangan APBN Pelaksana Lanjut/Mahir</td>
          <td>97.92</td>
          <td>97.92</td>
          <td>97.88</td>
          <td>93.15</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
          <td>98.00</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Script Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Grafik Jumlah Pegawai
    new Chart(document.getElementById('chartKekurangan'), {
      type: 'bar',
      data: {
        labels: <?= json_encode($jabatan); ?>,
        datasets: [{
          label: 'Jumlah Pegawai',
          data: <?= json_encode($jumlah); ?>,
          backgroundColor: ['#007bff','#28a745','#ffc107','#dc3545','#6f42c1','#fd7e14','#20c997'],
          borderColor: '#003366',
          borderWidth: 1,
          borderRadius: 6
        }]
      },
      options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
    });

    // Grafik Dummy Penilaian (contoh)
    new Chart(document.getElementById('chartKinerja'), {
      type: 'line',
      data: {
        labels: <?= json_encode($triwulan); ?>,
        datasets: [{
          label: 'Skor Pegawai Terbaik',
          data: <?= json_encode($skorPegawai); ?>,
          borderColor: '#007bff',
          backgroundColor: 'rgba(0, 123, 255, 0.2)',
          fill: true,
          tension: 0.3
        }]
      },
      options: { scales: { y: { beginAtZero: true } } }
    });
  </script>
</body>

</html>
