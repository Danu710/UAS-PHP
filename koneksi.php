<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uap_0569";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

echo "Koneksi berhasil";

?>