-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2024 pada 09.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_voting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `prestasi` text NOT NULL,
  `kompetensi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nip`, `jabatan`, `pangkat`, `prestasi`, `kompetensi`) VALUES
(18, 'Ir. Imam Sudarmaji', '196804161994011000', 'Kepala BPS Kota Pasuruan', 'Pembina Tk. I - IV/b', ' Satyalancana Karya Satya 20 Th;  Satyalancana Karya Satya 10 Th', ' Seminar Hari Statistik Nasional Big Data Practice In Public Sector'),
(19, 'Mohammad Lail Kurniawan S.Si, M.M', '198711082011011009', 'Kepala Subbagian Umum Kota Pasuruan', 'Penata Tk. I - III/d', ' Satyalancana Karya Satya 10 Th;  KSKP Tingkat Provinsi', ' LANSOW (Leading a Nasional Statistical Officer Workshop)'),
(20, 'Dewi Sulistiyawati S.Si, M.Si', '198205282009022006', 'Statistisi Ahli Muda BPS Kota Pasuruan', 'Penata Tk. I - III/d', ' Satyalancana Karya Satya 10 Th', ' Focus Group Discussion Pemanfaatan Data Susenas melalui tulisan opini'),
(21, 'Juharin Mufida Imawati, SST', '197801151999122001', 'Statistisi Ahli Muda BPS Kota Pasuruan', 'Penata Tk. I - III/d', ' Satyalancana Karya Satya 20 Th;  Satyalancana Karya Satya 10 Th', ' Pelatihan Teknis Penulisan Karya Tulis Ilmiah Fungsional Statistisi;  Pelatihan Pembina Desa Cantik Kabupaten/Kota 2022'),
(22, 'Muhammad Kurniawan, S.Si', '198605222012121001', 'Statistisi Ahli Muda BPS Kota Pasuruan', 'Penata - III/c', ' Pegawai Kinerja Terbaik Semester II 2023;  Pegawai Kinerja Terbaik Semester I 2024;  KSKP Tingkat Provinsi', ' Pelatihan Kompetensi PPK Tipe C model MOOC Batch 8 Tahun 2023'),
(23, 'Navy Yulianti Nukuhehe, S.Si', '198807072014032002', 'Statistisi Ahli Muda BPS Kota Pasuruan', 'Penata - III/c', ' Change Ambassador Tahun 2024', ' Webinar Sosialisasi Tabel Input Output Irio Provinsi Maluku'),
(24, 'Puguh Prijatno Widodo, S.Si.', '196903091994011002', 'Statistisi Ahli Muda BPS Kota Pasuruan', 'Penata Tk. I - III/d', ' Satyalancana Karya Satya 10 Th', ' PPK Negara Tersertifikasi;  Bimbingan Teknis Pengolahan Data Untuk Memproduksi Statistik Hayati (Oleh Bappenas)'),
(25, 'Sri Iriantiningsih. P.W, SE', '197110211994012001', 'Statistisi Ahli Muda BPS Kota Pasuruan', 'Penata Tk. I - III/d', ' Satyalancana Karya Satya 20 Th;  Satyalancana Karya Satya 10 Th', ' Pembina Bps Kabupaten/Kota Dalam Rangka Program Desa Cinta Statistik 2023;  Focus Group Discussion (FGD) Susenas Pemanfaatan Data Susenas Melalui Penulisan Opini'),
(26, 'Annisa Rohmi, SST, M.Sc', '198908092012112001', 'Statistisi Ahli Pertama BPS Kota Pasuruan', 'Penata Muda Tk. I - III/b', ' Satyalancana Karya Satya 10 Th', ' Coaching week teknis komunikasi;  Focus Group Discussion (FGD) SUSENAS \"Pemanfaatan Data Susenas Melalui Penulisan Opini\"'),
(27, 'Anugrah Alief Pratama, S.Tr.Stat', '199602232019011001', 'Statistisi Ahli Pertama BPS Kota Pasuruan', 'Penata Muda Tk. I - III/b', '', ' Pembina Bps Kabupaten/Kota Dalam Rangka Program Desa Cinta Statistik 2023;  Focus Group Discussion (FGD) Susenas Pemanfaatan Data Susenas Melalui Penulisan Opini'),
(28, 'Irawan, SE', '197202201994011001', 'Statistisi Ahli Pertama BPS Kota Pasuruan', 'Penata Tk. I - III/d', '', ' Pelatihan Teknis Statistik;  Pelatihan Fungsional Statistisi Tingkat Ahli Angkatan Ke 3 Tahun 2022'),
(29, 'Khoirunnisa, S.Tr.Stat', '199704032019122003', 'Statistisi Ahli Pertama BPS Kota Pasuruan', 'Penata Muda Tk. I - III/b', '', ' Bimbingan Teknis Kehumasan;  Bimbingan Teknis Pengolahan Statistik Hayati'),
(30, 'Mochammad Agus Masrul, A.Md., S.M.', '198506102011011016', 'Statistisi Ahli Pertama BPS Kota Pasuruan', 'Penata Muda Tk. I - III/b', ' Satyalancana Karya Satya 10 Th;  KSKP Tingkat Provinsi', ' Knowledge Sharing Inflasi;  Finance for Non Finance, From Beginner to Intermediate'),
(31, 'Sasono Widoyoko, SST', '198610112009021001', 'Statistisi Ahli Pertama BPS Kota Pasuruan', 'Penata Tk. I - III/d', '', ''),
(32, 'Eka Prahara Resbiyanti, A.Md', '198510202011012017', 'Pranata Keuangan APBN Mahir Kota Pasuruan', 'Penata Muda Tk. I - III/b', ' Satyalancana Karya Satya 10 Th', ' E-Learning MKN Dasar Pengantar Manajemen Keuangan Negara;  Open Class (AP Corner) Strategi Penyusunan Anggaran Belanja Berkualitas'),
(33, 'Suryanto', '197203081992031003', 'Statistisi Penyelia BPS Kota Pasuruan', 'Penata - III/c', ' Satyalancana Karya Satya 20 Th;  Satyalancana Karya Satya 10 Th', ' Kursus Statistik Dasar;  Pelatihan teknis Statistik'),
(34, 'Yuki Khaerunisa, SE', '198304292006042001', 'Analis Pengelolaan Keuangan APBN Ahli Pertama Kota Pasuruan', 'Penata Tk. I - III/d', ' Satyalancana Karya Satya 10 Th', ' Seminar Digital;  Pembinaan Administrasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voting_ambasador`
--

CREATE TABLE `voting_ambasador` (
  `id` int(11) NOT NULL,
  `nama_pemilih` varchar(100) NOT NULL,
  `question_1` varchar(100) DEFAULT NULL,
  `question_2` varchar(100) DEFAULT NULL,
  `question_3` varchar(100) DEFAULT NULL,
  `question_4` varchar(100) DEFAULT NULL,
  `question_5` varchar(100) DEFAULT NULL,
  `question_6` varchar(100) DEFAULT NULL,
  `question_7` varchar(100) DEFAULT NULL,
  `question_8` varchar(100) DEFAULT NULL,
  `question_9` varchar(100) DEFAULT NULL,
  `question_10` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `voting_pegawai`
--

CREATE TABLE `voting_pegawai` (
  `id` int(11) NOT NULL,
  `nama_pemilih` varchar(255) NOT NULL,
  `question_1` varchar(255) DEFAULT NULL,
  `question_2` varchar(255) DEFAULT NULL,
  `question_3` varchar(255) DEFAULT NULL,
  `question_4` varchar(255) DEFAULT NULL,
  `question_5` varchar(255) DEFAULT NULL,
  `question_6` varchar(255) DEFAULT NULL,
  `question_7` varchar(255) DEFAULT NULL,
  `question_8` varchar(255) DEFAULT NULL,
  `question_9` varchar(255) DEFAULT NULL,
  `question_10` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `voting_ambasador`
--
ALTER TABLE `voting_ambasador`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `voting_pegawai`
--
ALTER TABLE `voting_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `voting_ambasador`
--
ALTER TABLE `voting_ambasador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `voting_pegawai`
--
ALTER TABLE `voting_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
