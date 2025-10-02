<?php
include 'koneksi.php'; // Koneksi ke database

// Handle download CSV untuk tabel voting pegawai
if (isset($_POST['download_csv_pegawai'])) {
    $sql_pegawai = "SELECT * FROM voting_pegawai";
    $result_pegawai = $conn->query($sql_pegawai);

    $filename = "voting_pegawai.csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="' . $filename . '"');

    $output = fopen('php://output', 'w');
    $header = ['Nama Pemilih', 'Pertanyaan 1', 'Pertanyaan 2', 'Pertanyaan 3', 'Pertanyaan 4', 'Pertanyaan 5', 
               'Pertanyaan 6', 'Pertanyaan 7', 'Pertanyaan 8', 'Pertanyaan 9', 'Pertanyaan 10'];
    fputcsv($output, $header);

    if ($result_pegawai->num_rows > 0) {
        while ($row = $result_pegawai->fetch_assoc()) {
            $data = [
                $row['nama_pemilih'], 
                $row['question_1'], $row['question_2'], $row['question_3'], 
                $row['question_4'], $row['question_5'], $row['question_6'], 
                $row['question_7'], $row['question_8'], $row['question_9'], 
                $row['question_10']
            ];
            fputcsv($output, $data);
        }
    }
    fclose($output);
    exit();
}

// Handle download CSV untuk tabel voting ambasador
if (isset($_POST['download_csv_ambasador'])) {
    $sql_ambasador = "SELECT * FROM voting_ambasador";
    $result_ambasador = $conn->query($sql_ambasador);

    $filename = "voting_ambasador.csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="' . $filename . '"');

    $output = fopen('php://output', 'w');
    $header = ['Nama Pemilih', 'Pertanyaan 1', 'Pertanyaan 2', 'Pertanyaan 3', 'Pertanyaan 4', 'Pertanyaan 5', 
               'Pertanyaan 6', 'Pertanyaan 7', 'Pertanyaan 8', 'Pertanyaan 9', 'Pertanyaan 10'];
    fputcsv($output, $header);

    if ($result_ambasador->num_rows > 0) {
        while ($row = $result_ambasador->fetch_assoc()) {
            $data = [
                $row['nama_pemilih'], 
                $row['question_1'], $row['question_2'], $row['question_3'], 
                $row['question_4'], $row['question_5'], $row['question_6'], 
                $row['question_7'], $row['question_8'], $row['question_9'], 
                $row['question_10']
            ];
            fputcsv($output, $data);
        }
    }
    fclose($output);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Voting</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>

/* Main Content Styling */
h2 {
    font-size: 20px;
    color: #333;
    margin-bottom: 15px;
    justify-content: center;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    padding: 8px;
    border: 1px solid #ddd;
    text-align: center;
}

table th {
    background-color: #007bff;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f8f8f8;
}

/* Button Styling */
button {
    background-color: #28a745;
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

button:hover {
    background-color: #218838;
}

/* Form Styling */
form {
    text-align: center;
    margin-top: 15px;
}
</style>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="navbar-right">
                <a href="index.php" class="app-name"><i>SEMI PERKA (Sistem Monitoring Implementasi BerAKHLAK Kota Pasuruan)</i></a>
            </div>
            <div class="navbar-left">
                <a href="index.php" class="nav-item">Beranda</a>
                <a href="profil.php" class="nav-item">Profil</a>
                <a href="katagory.php" class="nav-item">Voting</a>
                <a href="result.php" class="nav-item">Result</a>
            </div>
        </nav>
    </header>

<body>
    <!-- Tabel Voting Pegawai -->
    <h2>Data Voting Pegawai</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Pemilih</th>
                <th>Pertanyaan 1</th>
                <th>Pertanyaan 2</th>
                <th>Pertanyaan 3</th>
                <th>Pertanyaan 4</th>
                <th>Pertanyaan 5</th>
                <th>Pertanyaan 6</th>
                <th>Pertanyaan 7</th>
                <th>Pertanyaan 8</th>
                <th>Pertanyaan 9</th>
                <th>Pertanyaan 10</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_pegawai = "SELECT * FROM voting_pegawai"; // Query sesuai tabel
            $result_pegawai = $conn->query($sql_pegawai);
            if ($result_pegawai->num_rows > 0) {
                while ($row = $result_pegawai->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nama_pemilih']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_1']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_2']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_3']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_4']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_5']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_6']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_7']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_8']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_9']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_10']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Tidak ada data.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <form method="post" action="">
        <button type="submit" name="download_csv_pegawai">Download Voting</button>
    </form>

    <!-- Tabel Voting Ambasador -->
    <h2>Data Voting Ambasador</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Pemilih</th>
                <th>Pertanyaan 1</th>
                <th>Pertanyaan 2</th>
                <th>Pertanyaan 3</th>
                <th>Pertanyaan 4</th>
                <th>Pertanyaan 5</th>
                <th>Pertanyaan 6</th>
                <th>Pertanyaan 7</th>
                <th>Pertanyaan 8</th>
                <th>Pertanyaan 9</th>
                <th>Pertanyaan 10</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_ambasador = "SELECT * FROM voting_ambasador"; // Query sesuai tabel
            $result_ambasador = $conn->query($sql_ambasador);
            if ($result_ambasador->num_rows > 0) {
                while ($row = $result_ambasador->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nama_pemilih']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_1']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_2']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_3']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_4']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_5']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_6']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_7']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_8']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_9']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['question_10']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Tidak ada data.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <form method="post" action="">
        <button type="submit" name="download_csv_ambasador">Download Voting</button>
    </form>
</body>
</html>
