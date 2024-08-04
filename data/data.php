<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "uap_0569");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Koneksi berhasil";

// Query untuk mendapatkan semua data dari tabel tiket
$sql = "SELECT * FROM tiket";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tiket</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Daftar Tiket</h1>
    <table>
        <tr>
            <th>Kode Tiket</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Jenis Film</th>
            <th>Jumlah Tiket</th>
            <th>Harga Tiket</th>
            <th>Total Harga</th>
            <th>Diskon</th>
            <th>Harga Akhir</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data dari setiap row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["kode_tiket"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["usia"] . "</td>";
                echo "<td>" . $row["jenis_film"] . "</td>";
                echo "<td>" . $row["jumlah_tiket"] . "</td>";
                echo "<td>" . number_format($row["harga_tiket"], 2, ',', '.') . "</td>";
                echo "<td>" . number_format($row["total_harga"], 2, ',', '.') . "</td>";
                echo "<td>" . number_format($row["diskon"], 2, ',', '.') . "</td>";
                echo "<td>" . number_format($row["harga_akhir"], 2, ',', '.') . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Tidak ada data tiket</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>