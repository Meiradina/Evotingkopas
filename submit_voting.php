<?php
include 'koneksi.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $namaPemilih = htmlspecialchars($_POST['voter_name']);
    $question_1 = htmlspecialchars($_POST['question_1']);
    $question_2 = htmlspecialchars($_POST['question_2']);
    $question_3 = htmlspecialchars($_POST['question_3']);
    $question_4 = htmlspecialchars($_POST['question_4']);
    $question_5 = htmlspecialchars($_POST['question_5']);
    $question_6 = htmlspecialchars($_POST['question_6']);
    $question_7 = htmlspecialchars($_POST['question_7']);
    $question_8 = htmlspecialchars($_POST['question_8']);
    $question_9 = htmlspecialchars($_POST['question_9']);
    $question_10 = htmlspecialchars($_POST['question_10']);

    // Query untuk menyimpan data ke dalam tabel voting_ambasador
    $query = "INSERT INTO voting_pegawai (nama_pemilih, question_1, question_2, question_3, question_4, question_5, question_6, question_7, question_8, question_9, question_10) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Menyiapkan statement
    if ($stmt = $conn->prepare($query)) {
        // Mengikat parameter
        $stmt->bind_param("sssssssssss", $namaPemilih, $question_1, $question_2, $question_3, $question_4, $question_5, $question_6, $question_7, $question_8, $question_9, $question_10);

        // Menjalankan statement
        if ($stmt->execute()) {
            // Menutup statement
            $stmt->close();

            // Menampilkan alert dan mengalihkan ke halaman voting.php
            echo "<script>
                    alert('Data penilaian berhasil terkirim.');
                    window.location.href = 'kategori_penilaian.php'; // Ganti dengan halaman yang diinginkan
                  </script>";
            exit();
        } else {
            echo "Terjadi kesalahan saat menyimpan penilaian: " . $stmt->error;
        }

        // Menutup statement
        $stmt->close();
    } else {
        echo "Terjadi kesalahan dalam persiapan statement: " . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>