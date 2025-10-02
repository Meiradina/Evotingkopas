<?php
$servername = "localhost"; // Ganti dengan nama server Anda jika diperlukan
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "evoting"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "";
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

