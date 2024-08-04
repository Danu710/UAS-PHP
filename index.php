<?php
session_start();

// Misalkan ini adalah level pengguna yang disimpan dalam session
$_SESSION['tiket'] = 1;

if (isset($_GET['x']) && $_GET['x'] == 'tiket') {
    if ($_SESSION['tiket'] == 1) {
        $page = "tiket/tiket.php";
    } else {
        $page = "home";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'data') {
    if ($_SESSION['tiket'] == 1) {
        $page = "data/data.php";
    } else {
        $page = "home";
    }
}elseif (isset($_GET['x']) && $_GET['x'] == 'jarak') {
    if ($_SESSION['tiket'] == 1) {
        $page = "jarak/jarak.php";
    } else {
        $page = "home";
    }
}else {
    $page = "home";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Penjualan Tiket Bioskop</title>
</head>
<body>
    <?php
    if ($page == "home") {
        echo '<h1>Selamat Datang di Penjualan Tiket Bioskop</h1>';
        echo '<a href="index.php?x=tiket">Kelola Tiket Bioskop</a>';
        echo '<br>';
        echo '<h1>Data tiket pembeli</h1>';
        echo '<a href="index.php?x=data">Kelola Data Pembeli Tiket</a>';
        echo '<br>';
        echo '<h1>Perhitungan jarak tempuh</h1>';
        echo '<a href="index.php?x=jarak">Perhitungan jarak tempuh</a>';
    } else {
        include $page;
    }
    ?>
</body>
</html>