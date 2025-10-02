<?php
include 'koneksi.php'; // Menyertakan file koneksi

// Mengambil query pencarian dari parameter URL
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Menyiapkan dan mengeksekusi query pencarian
$sql = "SELECT * FROM pegawai WHERE nama LIKE ? OR jabatan LIKE ? OR prestasi LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%" . $query . "%";
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Menyusun hasil pencarian ke dalam array
$employees = [];
while ($row = $result->fetch_assoc()) {
    $employees[] = $row;
}

// Mengembalikan hasil dalam format JSON
header('Content-Type: application/json');
echo json_encode($employees);

// Menutup koneksi
$stmt->close();
$conn->close();
?>