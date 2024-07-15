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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title> Home </title>
</head>
<body>
  
<!-- Iki Navbar yo-->

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
            <a class="dropdown-item text-center text-secondary" href="#"> <span class="text-capitalize"><?php echo $_SESSION['admin']['nama_admin']; ?></a>
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

    
    <!-- Iki bagian card peminjaman, buku karo Pengembalian -->
    <div class="d-flex flex-wrap justify-content-center"> 

        <div class="cardImg"> 
          <a href="peminjaman.php">
            <img src="Assets/peminjaman.png" alt="Peminjaman" style="max-width: 100%;" width="400px">
          </a>
        </div>
        <div class="cardImg">
          <a href="pengembalian.php">
          <img src="Assets/pengembalian.png" alt="Pengembalian" style="max-width: 100%;" width="400px">
          </a>
        </div>
      
        </div>
      
    </div>

    <footer class="footer">
    &copy; 2024 Kedai Perpus Dika. All rights reserved.







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>