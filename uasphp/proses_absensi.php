<?php
// database menggunakan file koneksi.php (buat file koneksi.php terlebih dahulu)
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_karyawan = $_POST["nama"];
    $tanggal_absensi = $_POST["tanggal"];
    $jam_masuk = $_POST["jam_masuk"];
    $jam_keluar = $_POST["jam_keluar"];

    // Menyimpan data absensi ke dalam tabel absensi
    $sql = "INSERT INTO absensi (nama_karyawan, tanggal_absensi, jam_masuk, jam_keluar)
            VALUES ('$nama_karyawan', '$tanggal_absensi', '$jam_masuk', '$jam_keluar')";

    if ($conn->query($sql) === TRUE) {
        // Redirect kembali ke halaman absen setelah data berhasil disimpan
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
}
?>
