sql
CREATE DATABASE uap_0569;

USE uap_0569;

CREATE TABLE tiket (
    kode_tiket VARCHAR(50) PRIMARY KEY,
    nama VARCHAR(100),
    usia INT,
    jenis_film VARCHAR(50),
    jumlah_tiket INT,
    harga_tiket DECIMAL(10, 2),
    total_harga DECIMAL(10, 2),
    diskon DECIMAL(5, 2),
    harga_akhir DECIMAL(10, 2)
);