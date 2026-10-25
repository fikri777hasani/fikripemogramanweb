<?php

// koneksi ke database
require_once __DIR__ . "/connect.php";

// cek apakah data dikirim menggunakan POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ambil data dari form
    $nim = trim($_POST['nim'] ?? '');
    $namamhsw = trim($_POST['namamhsw'] ?? '');
    $nilaiakhir = trim($_POST['nilaiakhir'] ?? '');

    // validasi data
    if (
        $nim !== '' &&
        preg_match("/^[0-9]+$/", $nim) &&
        $namamhsw !== '' &&
        preg_match("/^[a-zA-Z' ]+$/", $namamhsw) &&
        $nilaiakhir !== '' &&
        is_numeric($nilaiakhir) &&
        $nilaiakhir >= 0 &&
        $nilaiakhir <= 100
    ) {

        // query menyimpan data mahasiswa
        $filePath = "../dist/assets/img/avatar.png";
        $sql = "INSERT INTO nilaimahasiswa
                (nim, namamhsw, nilaiakhir, nilaihuruf, predikat, file_path)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {

            $nilaiakhir = (float) $nilaiakhir;
            if ($nilaiakhir >= 85) {
                $nilaiHuruf = "A";
                $predikat = "Sangat Baik";
            } elseif ($nilaiakhir >= 75) {
                $nilaiHuruf = "B";
                $predikat = "Baik";
            } elseif ($nilaiakhir >= 65) {
                $nilaiHuruf = "C";
                $predikat = "Cukup";
            } elseif ($nilaiakhir >= 50) {
                $nilaiHuruf = "D";
                $predikat = "Kurang";
            } else {
                $nilaiHuruf = "E";
                $predikat = "Sangat Kurang";
            }

            mysqli_stmt_bind_param(
                $stmt,
                "ssdsss",
                $nim,
                $namamhsw,
                $nilaiakhir,
                $nilaiHuruf,
                $predikat,
                $filePath
            );

            if (mysqli_stmt_execute($stmt)) {
                echo "Data mahasiswa berhasil disimpan!";
            } else {
                echo "Gagal menyimpan data.";
            }

            mysqli_stmt_close($stmt);

        } else {
            echo "Gagal menyiapkan query database.";
        }

    } else {
        echo "Data tidak valid. Periksa kembali NIM, nama, dan nilai akhir.";
    }

} else {
    echo "Silakan kirim data melalui form.";
}

header("Location: readdata.php");
// tutup koneksi database
//mysqli_close($conn);

?>