<?php
$conn = new mysqli("localhost", "root", "", "uap_0569");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function hitungHarga($jenis_film, $jumlah_tiket, $usia) {
    // Harga tiket berdasarkan jenis film
    $harga_tiket = 0;
    switch($jenis_film) {
        case 1:
            $harga_tiket = 50000;
            $jenis_film_str = "Action";
            break;
        case 2:
            $harga_tiket = 45000;
            $jenis_film_str = "Drama";
            break;
        case 3:
            $harga_tiket = 40000;
            $jenis_film_str = "Komedi";
            break;
        default:
            echo "Jenis film tidak valid!";
            exit;
    }

    // Menghitung total harga sebelum diskon
    $total_harga = $harga_tiket * $jumlah_tiket;

    // Menghitung diskon berdasarkan usia
    $diskon = 0;
    if ($usia < 12) {
        $diskon = 0.20;
    } elseif ($usia >= 60) {
        $diskon = 0.30;
    }

    // Diskon tambahan jika membeli lebih dari 3 tiket
    if ($jumlah_tiket > 3) {
        $diskon += 0.05;
    }

    // Menghitung total diskon dan harga akhir
    $total_diskon = $total_harga * $diskon;
    $harga_akhir = $total_harga - $total_diskon;

    return [
        'jenis_film_str' => $jenis_film_str,
        'harga_tiket' => $harga_tiket,
        'total_harga' => $total_harga,
        'total_diskon' => $total_diskon,
        'harga_akhir' => $harga_akhir
    ];
}

function simpanTiket($conn, $kode_tiket, $nama, $usia, $jenis_film, $jumlah_tiket, $harga_tiket, $total_harga, $total_diskon, $harga_akhir) {
    $sql = "INSERT INTO tiket (kode_tiket, nama, usia, jenis_film, jumlah_tiket, harga_tiket, total_harga, diskon, harga_akhir)
            VALUES ('$kode_tiket', '$nama', $usia, '$jenis_film', $jumlah_tiket, $harga_tiket, $total_harga, $total_diskon, $harga_akhir)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Tiket berhasil disimpan!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['submit_pembeli'])) {
    $jumlah_pembeli = $_POST['jumlah_pembeli'];
    echo "<form method='post'>";
    for ($i = 0; $i < $jumlah_pembeli; $i++) {
        echo "<h3>Pembeli " . ($i + 1) . "</h3>";
        echo "<label for='nama_$i'>Namaa:</label>";
        echo "<input type='text' id='nama_$i' name='nama[]' required><br>";
        echo "<label for='usia_$i'>Usia:</label>";
        echo "<input type='number' id='usia_$i' name='usia[]' required><br>";
        echo "<label for='jenis_film_$i'>Jenis Film:</label>";
        echo "<select id='jenis_film_$i' name='jenis_film[]'>";
        echo "<option value='1'>Action</option>";
        echo "<option value='2'>Drama</option>";
        echo "<option value='3'>Komedi</option>";
        echo "</select><br>";
        echo "<label for='jumlah_tiket_$i'>Jumlah Tiket:</label>";
        echo "<input type='number' id='jumlah_tiket_$i' name='jumlah_tiket[]' required><br><br>";
    }
    echo "<input type='submit' name='submit_tiket'>";
    echo "</form>";
} elseif (isset($_POST['submit_tiket'])) {
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $jenis_film = $_POST['jenis_film'];
    $jumlah_tiket = $_POST['jumlah_tiket'];

    for ($i = 0; $i < count($nama); $i++) {
        $kode_tiket = uniqid(); // Membuat kode tiket unik
        $hasil = hitungHarga($jenis_film[$i], $jumlah_tiket[$i], $usia[$i]);
        simpanTiket($conn, $kode_tiket, $nama[$i], $usia[$i], $hasil['jenis_film_str'], $jumlah_tiket[$i], $hasil['harga_tiket'], $hasil['total_harga'], $hasil['total_diskon'], $hasil['harga_akhir']);
        echo "Detail Pembelian:<br>";
        echo "Nama: " . $nama[$i] . "<br>";
        echo "Jenis Film: " . $hasil['jenis_film_str'] . "<br>";
        echo "Jumlah Tiket: " . $jumlah_tiket[$i] . "<br>";
        echo "Harga Sebelum Diskon: Rp " . number_format($hasil['total_harga'], 2, ',', '.') . "<br>";
        echo "Total Diskon: Rp " . number_format($hasil['total_diskon'], 2, ',', '.') . "<br>";
        echo "Harga Akhir: Rp " . number_format($hasil['harga_akhir'], 2, ',', '.') . "<br><br>";
    }
    $conn->close();
}
?>


