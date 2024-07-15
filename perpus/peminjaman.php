

<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: login.php");
  exit;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info ">
      <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
          <img src=" Assets/Pradika Satia Putra.png" alt="Pradika Satia Putra" width="120px">
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
            <a class="dropdown-item text-center text-secondary" href="login.php"> <span class="text-capitalize"><?php echo $_SESSION['admin']['nama_admin']; ?></a>
            </span>
          </li>
          <hr>
          <li>
            <a class="dropdown-item text-center mb-2" href="#">Akun Terverifikasi <span class="text-primary"><i class="fa-solid fa-circle-check"></i></span></a>
          </li>
          <li>
            <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="logout.php"> Log Out <i class="fa-solid fa-right-to-bracket"></i></a>
          </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container mt-5">
    <h1 class="text-center">HALAMAN PEMINJAMAN BUKU</h1>
    <br><br><br>
    <div class="row">
        <div class="col-md-6 text-white">
            <h3>Data Buku</h3>
            <div class="col-md-8 bg-danger-subtle text-dark p-2">
                <form id="bookForm" action="tambah_buku.php" method="POST">
                    <div class="mb-3">
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
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit">
                    </div>
                    <div class="mb-3">
                        <label for="kurikulum" class="form-label">Kurikulum</label>
                        <input type="text" class="form-control" id="kurikulum" name="kurikulum">
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis">
                    </div>
                    <input type="submit" value="Tambah" class="btn btn-primary">
                </form>
            </div>
        </div>

        <div class="col-md-6 text-white">
            <h3>Data Peminjam Buku</h3>
            <div class="col-md-8 bg-danger-subtle text-dark p-4">
                <form action="pinjam.php" method="POST">
                    <div class="mb-3">
                        <label for="kode_peminjaman" class="form-label">Kode Peminjaman</label>
                        <input type="text" class="form-control" id="kode_peminjaman" name="kode_peminjaman">
                    </div>
                    <div class="mb-3">
                        <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam">
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
                        <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
                    </div>
                    <button type="submit" class="btn btn-primary">Pinjam Buku</button>
                </form>
            </div>
        </div>
        
      

<!-- Tabel Peminjaman -->

        <h3 class="mt-5 text-white">Daftar Buku yang Dipinjam</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Peminjaman</th>
                    <th>Nama Peminjam</th>
                    <th>Kelas</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'config.php';
                $result = $conn->query("SELECT * FROM peminjaman");
                if($result->num_rows > 0) {
                    $id=1;
                    while($row = $result->fetch_assoc()){
                        echo "<tr> 
                        <td>" . $id++ . "</td>
                        <td>" . $row['kode_peminjaman'] . "</td>
                        <td>" . $row['nama_peminjam'] . "</td>
                        <td>" . $row['kelas'] . "</td>
                        <td>" . $row['tanggal_pinjam'] . "</td>
                        <td>" . $row['tanggal_kembali'] . "</td>
                        </tr>";
                    }
                } else { 
                    echo "<tr><td colspan='6'>No Records Found</td></tr>";
                }
                $conn->close();
                ?> 
            </tbody>
        </table>
    </div>


    <!-- Tabel Data Buku -->

        <h3 class="mt-5 text-white">Data Buku</h3>
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
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'config.php';
                $result = $conn->query("SELECT * FROM buku");
                if($result->num_rows > 0) {
                    $id=1;
                    while($row = $result->fetch_assoc()){
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

    <a href="home.php" class="kembali-1">Kembali</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>