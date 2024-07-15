<?php
include 'config.php';
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_peminjaman = $_POST['kode_peminjaman'];
    $nama_peminjam = $_POST['nama_peminjam'];
    $kelas = $_POST['kelas'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $sql = "INSERT INTO peminjaman (kode_peminjaman, nama_peminjam, kelas, tanggal_pinjam, tanggal_kembali) VALUES ('$kode_peminjaman', '$nama_peminjam', '$kelas', '$tanggal_pinjam', '$tanggal_kembali')";

    if ($conn->query($sql) === TRUE) {
        echo "Peminjaman Buku Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<br><br>
<a href="peminjaman.php"> Kembali Ke Halaman Peminjaman</a>