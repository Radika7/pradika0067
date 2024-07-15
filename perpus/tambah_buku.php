<?php
include 'config.php';
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST['id_buku'];
    $kode_buku = $_POST['kode_buku'];
    $nama_buku = $_POST['nama_buku'];
    $pelajaran = $_POST['pelajaran'];
    $kelas = $_POST['kelas'];
    $penerbit = $_POST['penerbit'];
    $kurikulum = $_POST['kurikulum'];
    $penulis = $_POST['penulis'];

    $sql = "INSERT INTO buku (id_buku, kode_buku, nama_buku, pelajaran, kelas, penerbit, kurikulum, penulis) VALUES ('$id_buku', '$kode_buku', '$nama_buku', '$pelajaran', '$kelas', '$penerbit', '$kurikulum', '$penulis')";

    if ($conn->query($sql) === TRUE) {
        echo "Tambah Buku Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<br><br>
<a href="peminjaman.php"> Kembali Ke Halaman Peminjaman</a>