<!DOCTYPE html>
<html>
<head>
    <title>Penjualan Tiket Bioskop</title>
</head>
<body>
    <h1>Penjualan Tiket Bioskop</h1>
    <form method="post" action="tiket/proses_tambah_tiket.php">
        <label for="jumlah_pembeli">Jumlah Pembeli Tiket:</label>
        <input type="number" id="jumlah_pembeli" name="jumlah_pembeli" required>
        <input type="submit" name="submit_pembeli" value="Submit">
    </form>
</body>
</html>