<!DOCTYPE html>
<html>
<head>
    <title>Absensi Karyawan Kantor</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <img src="bawaslu.png" alt="Logo Perusahaan">
        <h1>Absensi Karyawan Kantor</h1>
    </header>
    <div class="container">
        <form action="proses_absensi.php" method="post">
            <label for="nama">Nama Karyawan:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="tanggal">Tanggal Absensi:</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="jam_masuk">Jam Masuk:</label>
            <input type="time" id="jam_masuk" name="jam_masuk" required>

            <label for="jam_keluar">Jam Keluar:</label>
            <input type="time" id="jam_keluar" name="jam_keluar" required>

            <button type="submit">Absen</button>
        </form>
      <?php
// Sambungkan ke database menggunakan file koneksi.php (buat file koneksi.php terlebih dahulu)
require_once "koneksi.php";

// Ambil data absensi dari tabel absensi
$sql = "SELECT * FROM absensi";
$result = $conn->query($sql);
$absensi_data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $absensi_data[] = $row;
    }
}
?>

<!-- ... kode lainnya ... -->

<div class="absensi-list">
    <h2>Data Absensi Karyawan</h2>
    <table>
        <tr>
            <th>Nama Karyawan</th>
            <th>Tanggal Absensi</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
        </tr>
        <?php foreach ($absensi_data as $absen) { ?>
            <tr>
                <td><?php echo $absen['nama_karyawan']; ?></td>
                <td><?php echo $absen['tanggal_absensi']; ?></td>
                <td><?php echo $absen['jam_masuk']; ?></td>
                <td><?php echo $absen['jam_keluar']; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
</div>

        </div>
    </div>
</body>
</html>
