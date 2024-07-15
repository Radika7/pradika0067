<?php
include 'config.php';
session_start();

if (!isset($_SESSION["signIn"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_peminjaman = $_POST['kode_peminjaman'];
    $kode_pengembalian = $_POST['kode_pengembalian'];
    $nama_pinjam = $_POST['nama_pinjam'];
    $kelas = $_POST['kelas'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $rencana_kembali = $_POST['rencana_kembali'];
    $hari_pengembalian = $_POST['hari_pengembalian'];
    $denda = $_POST['denda'];

    $sql = "INSERT INTO pengembalian (kode_peminjaman, kode_pengembalian, nama_pinjam, kelas, tanggal_pinjam, rencana_kembali, hari_pengembalian, denda) 
            VALUES ('$kode_peminjaman', '$kode_pengembalian', '$nama_pinjam', '$kelas', '$tanggal_pinjam', '$rencana_kembali', '$hari_pengembalian', '$denda')";

    if ($conn->query($sql) === TRUE) {
        echo "Pengembalian Buku Berhasil ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengembalian Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar bg-info shadow-sm">
    <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
            <img src="Assets/Pradika Satia Putra.png" alt="Pradika Satia Putra" width="120px">
        </a>
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="assets/Kedai perpus.png" alt="Kedai perpus" width="120px">
            </button>
            <ul style="margin-left: -7rem;" class="dropdown-menu position-absolute mt-2 p-2">
                <li>
                    <a class="dropdown-item text-center" href="#">
                        <img src="Assets/monyet.png" alt="monyet" width="80px">
                    </a>
                </li>
                <li>
                    <a class="dropdown-item text-center text-secondary" href="#">
                        <span class="text-capitalize"><?php echo $_SESSION['admin']['nama_admin']; ?></span>
                    </a>
                </li>
                <hr>
                <li>
                    <a class="dropdown-item text-center mb-2" href="#">Akun Terverifikasi 
                        <span class="text-primary"><i class="fa-solid fa-circle-check"></i></span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="logout.php">Log Out 
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Halaman -->
<div class="container mt-5  text-white">
    <h1 class="text-center">DATA PENGEMBALIAN BUKU</h1>
    <div class="row">
        <div class="col-md-6  ">
            <h3>Data Buku</h3>
            <form id="bookForm ">
                <div class="mb-3 ">
                    <label for="id_buku" class="form-label">ID Buku</label>
                    <input type="text" class="form-control" id="id_buku" name="id_buku">
                </div>
                <div class="mb-3">
                    <label for="kode_buku" class="form-label">Kode Buku</label>
                    <input type="text" class="form-control" id="kode_buku" name="kode_buku">
                </div>
                <div class="mb-3">
                    <label for="nama_buku" class="form-label">Nama Buku</label>
                    <input type="text" class="form-control" id="nama_buku" name="nama_buku">
                </div>
                <div class="mb-3">
                    <label for="pelajaran" class="form-label">Pelajaran</label>
                    <input type="text" class="form-control" id="pelajaran" name="pelajaran">
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas">
                </div>
                <div class="mb-3">
                    <label for="kurikulum" class="form-label">Kurikulum</label>
                    <input type="text" class="form-control" id="kurikulum" name="kurikulum">
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis">
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <h3>Data Pengembali Buku</h3>
            <form action="pengembalian.php" method="POST">
                <div class="mb-3">
                    <label for="kode_peminjaman" class="form-label">Kode Peminjaman</label>
                    <input type="text" class="form-control" id="kode_peminjaman" name="kode_peminjaman">
                </div>
                <div class="mb-3">
                    <label for="kode_pengembalian" class="form-label">Kode Pengembalian</label>
                    <input type="text" class="form-control" id="kode_pengembalian" name="kode_pengembalian">
                </div>
                <div class="mb-3">
                    <label for="nama_pinjam" class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control" id="nama_pinjam" name="nama_pinjam">
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-select" id="kelas" name="kelas">
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam">
                </div>
                <div class="mb-3">
                    <label for="rencana_kembali" class="form-label">Rencana Kembali</label>
                    <input type="date" class="form-control" id="rencana_kembali" name="rencana_kembali">
                </div>
                <div class="mb-3">
                    <label for="hari_pengembalian" class="form-label">Hari Pengembalian</label>
                    <input type="date" class="form-control" id="hari_pengembalian" name="hari_pengembalian">
                </div>
                <div class="mb-3">
                    <label for="denda" class="form-label">Denda</label>
                    <input type="text" class="form-control" id="denda" name="denda">
                </div>
                <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
            </form>
        </div>
    </div>

    <a href="home.php" class="kembali-1">Kembali</a>

    <!-- Tabel Data Buku -->
    <h3 class="mt-5 text-white">Daftar Pengembalian Buku</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
            
                <th>ID</th>
                    <th>ID Buku</th>
                    <th>Kode Buku</th>
                    <th>Nama Buku</th>
                    <th>Pelajaran</th>
                    <th>Kelas</th>
                    <th>Penerbit</th>
                    <th>Kurikulum</th>
                    <th>Penulis</th>
                <th>Kode Peminjaman</th>
                <th>Kode Pengembalian</th>
                <th>Nama Peminjam</th>
                <th>Kelas</th>
                <th>Tanggal Pinjam</th>
                <th>Rencana Kembali</th>
                <th>Hari Pengembalian</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            include 'config.php';
            $result = $conn->query("SELECT * FROM pengembalian, buku");
            if ($result->num_rows > 0) {
                $id = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr> 
               
                        <td>" . $id++ . "</td>
                        <td>" . $row['id_buku'] . "</td>
                        <td>" . $row['kode_buku'] . "</td>
                        <td>" . $row['nama_buku'] . "</td>
                        <td>" . $row['pelajaran'] . "</td>
                        <td>" . $row['kelas'] . "</td>
                        <td>" . $row['penerbit'] . "</td>
                        <td>" . $row['kurikulum'] . "</td>
                        <td>" . $row['penulis'] . "</td>
                    
                    <td>" . $row['kode_peminjaman'] . "</td>
                    <td>" . $row['kode_pengembalian'] . "</td>
                    <td>" . $row['nama_pinjam'] . "</td>
                    <td>" . $row['kelas'] . "</td>
                    <td>" . $row['tanggal_pinjam'] . "</td>
                    <td>" . $row['rencana_kembali'] . "</td>
                    <td>" . $row['hari_pengembalian'] . "</td>
                    <td>" . $row['denda'] . "</td>
                    </tr>";
                }
            } else { 
                echo "<tr><td colspan='9'>No Records Found</td></tr>";
            }
            $conn->close();
        ?>
        </tbody>
    </table>
</div>

<footer class="footer">
    &copy; 2024 Kedai Perpus Dika. All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>