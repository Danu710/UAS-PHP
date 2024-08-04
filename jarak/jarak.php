<?php
// Jarak antar kota dalam kilometer
$jarak = [
    'A_B' => 45,
    'B_C' => 51,
    'C_D' => 38,
    'D_E' => 110,
    'E_F' => 93
];

// Konsumsi bensin (Liter/KM)
$konsumsi_bensin_per_km = 1 / 9; // 1 liter untuk 9 KM

// Fungsi untuk menghitung konsumsi bensin
// function hitungBensin($jarak, $konsumsi_per_km) {
//     $total_jarak = array_sum($jarak);
//     $bensin_dibutuhkan = $total_jarak * $konsumsi_per_km;
//     return $bensin_dibutuhkan;
// }

// // 1. Berjalan dari Kota A ke F
// $jarak_AF = [$jarak['A_B'], $jarak['B_C'], $jarak['C_D'], $jarak['D_E'], $jarak['E_F']];
// $bensin_AF = hitungBensin($jarak_AF, $konsumsi_bensin_per_km);

// // 2. Berjalan dari Kota B ke E
// $jarak_BE = [$jarak['B_C'], $jarak['C_D'], $jarak['D_E']];
// $bensin_BE = hitungBensin($jarak_BE, $konsumsi_bensin_per_km);

// // 3. Berjalan dari Kota A ke F, Kemudian Kembali ke kota C
// $jarak_AF_C = array_merge($jarak_AF, array_reverse([$jarak['E_F'], $jarak['D_E'], $jarak['C_D']]));
// $bensin_AF_C = hitungBensin($jarak_AF_C, $konsumsi_bensin_per_km);

// // 4. Berjalan dari Kota A ke F – E -D -C -D – E -F
// $jarak_A_F_E_D_C_D_E_F = array_merge($jarak_AF, array_reverse([$jarak['E_F'], $jarak['D_E'], $jarak['C_D']]), [$jarak['D_E'], $jarak['E_F']]);
// $bensin_A_F_E_D_C_D_E_F = hitungBensin($jarak_A_F_E_D_C_D_E_F, $konsumsi_bensin_per_km);

// // Output hasil perhitungan
// echo "1. Bensin yang dibutuhkan untuk berjalan dari Kota A ke F: " . $bensin_AF . " Liter\n";
// echo "2. Bensin yang dibutuhkan untuk berjalan dari Kota B ke E: " . $bensin_BE . " Liter\n";
// echo "3. Bensin yang dibutuhkan untuk berjalan dari Kota A ke F, kemudian kembali ke Kota C: " . $bensin_AF_C . " Liter\n";
// echo "4. Bensin yang dibutuhkan untuk berjalan dari Kota A ke F – E -D -C -D – E -F: " . $bensin_A_F_E_D_C_D_E_F . " Liter\n";


function konsumsi_bensin($jarak) {
    return $jarak / 9;
}

$jarak_A_F = 45 + 51 + 38 + 110 + 93;
$jarak_B_E = 51 + 38 + 110;
$jarak_A_C_F = (45 + 51 + 38 + 110 + 93) + (93 + 110 + 38);
$jarak_A_F_E_D_C_D_E_F = 45 + 51 + 38 + 110 + 93 + 110 + 38 + 110 + 93;

echo "Konsumsi bensin dari Kota A ke F: " . konsumsi_bensin($jarak_A_F) . " liter\n";
echo "Konsumsi bensin dari Kota B ke E: " . konsumsi_bensin($jarak_B_E) . " liter\n";
echo "Konsumsi bensin dari Kota A ke F, kemudian kembali ke Kota C: " . konsumsi_bensin($jarak_A_C_F) . " liter\n";
echo "Konsumsi bensin dari Kota A ke F – E -D -C -D – E -F: " . konsumsi_bensin($jarak_A_F_E_D_C_D_E_F) . " liter\n";



// function hitung_bensin($jarak) {
//     $konsumsi_per_km = 9; // 1 liter untuk tiap 9 KM
//     return $jarak / $konsumsi_per_km;
// }

// // Jarak antara kota-kota
// $jarak_AB = 45;
// $jarak_BC = 51;
// $jarak_CD = 38;
// $jarak_DE = 110;
// $jarak_EF = 93;

// // 1. Berjalan dari Kota A ke F
// $jarak_AF = $jarak_AB + $jarak_BC + $jarak_CD + $jarak_DE + $jarak_EF;
// $bensin_AF = hitung_bensin($jarak_AF);

// // 2. Berjalan dari Kota B ke E
// $jarak_BE = $jarak_BC + $jarak_CD + $jarak_DE;
// $bensin_BE = hitung_bensin($jarak_BE);

// // 3. Berjalan dari Kota A ke F, Kemudian Kembali ke kota C
// $jarak_AF_kembali_C = $jarak_AF + $jarak_EF + $jarak_DE + $jarak_CD;
// $bensin_AF_kembali_C = hitung_bensin($jarak_AF_kembali_C);

// // 4. Berjalan dari Kota A ke F – E -D -C -D – E -F
// $jarak_perjalanan_kompleks = $jarak_AF + $jarak_EF + $jarak_DE + $jarak_CD + $jarak_CD + $jarak_DE + $jarak_EF;
// $bensin_perjalanan_kompleks = hitung_bensin($jarak_perjalanan_kompleks);

// echo "Bensin untuk perjalanan dari Kota A ke F: " . $bensin_AF . " liter\n";
// echo "Bensin untuk perjalanan dari Kota B ke E: " . $bensin_BE . " liter\n";
// echo "Bensin untuk perjalanan dari Kota A ke F, Kemudian Kembali ke kota C: " . $bensin_AF_kembali_C . " liter\n";
// echo "Bensin untuk perjalanan dari Kota A ke F – E -D -C -D – E -F: " . $bensin_perjalanan_kompleks . " liter\n";


$jarak = [
    'A_B' => 45,
    'B_C' => 51,
    'C_D' => 38,
    'D_E' => 110,
    'E_F' => 93
];

// Konsumsi bensin dalam KM per liter
$konsumsi_per_liter = 9;

// Fungsi untuk menghitung bensin yang dibutuhkan
function hitungBensin($jarak, $konsumsi_per_liter) {
    return $jarak / $konsumsi_per_liter;
}

// 1. Berjalan dari Kota A ke F
$jarak_A_F = $jarak['A_B'] + $jarak['B_C'] + $jarak['C_D'] + $jarak['D_E'] + $jarak['E_F'];
$bensin_A_F = hitungBensin($jarak_A_F, $konsumsi_per_liter);
echo "Bensin yang dibutuhkan untuk perjalanan dari Kota A ke F: " . $bensin_A_F . " liter\n";

// 2. Berjalan dari Kota B ke E
$jarak_B_E = $jarak['B_C'] + $jarak['C_D'] + $jarak['D_E'];
$bensin_B_E = hitungBensin($jarak_B_E, $konsumsi_per_liter);
echo "Bensin yang dibutuhkan untuk perjalanan dari Kota B ke E: " . $bensin_B_E . " liter\n";

// 3. Berjalan dari Kota A ke F, kemudian kembali ke Kota C
$jarak_A_F_C = $jarak_A_F + $jarak['E_F'] + $jarak['D_E'] + $jarak['C_D'];
$bensin_A_F_C = hitungBensin($jarak_A_F_C, $konsumsi_per_liter);
echo "Bensin yang dibutuhkan untuk perjalanan dari Kota A ke F, kemudian kembali ke Kota C: " . $bensin_A_F_C . " liter\n";

// 4. Berjalan dari Kota A ke F – E -D -C -D – E -F
$jarak_A_F_E_D_C_D_E_F = $jarak_A_F + $jarak['E_F'] + $jarak['D_E'] + $jarak['C_D'] + $jarak['C_D'] + $jarak['D_E'] + $jarak['E_F'];
$bensin_A_F_E_D_C_D_E_F = hitungBensin($jarak_A_F_E_D_C_D_E_F, $konsumsi_per_liter);
echo "Bensin yang dibutuhkan untuk perjalanan dari Kota A ke F – E -D -C -D – E -F: " . $bensin_A_F_E_D_C_D_E_F . " liter\n";
?>