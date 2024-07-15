
<?php
// Session star dinggo nggo intruksi mulai//
session_start();

if(isset($_SESSION["signIn"]) ) {
  header("Location: home.php");
  exit;
}


// untuk validasi login //
require "connect.php";


if(isset($_POST["signIn"]) ) {
  
  $nama = strtolower($_POST["nama_admin"]);
  $password = $_POST["password"];
  
  $result = mysqli_query($connect, "SELECT * FROM admin WHERE nama_admin = '$nama' AND password = '$password' ");
  
  if(mysqli_num_rows($result) === 1) {
    //SET SESSION //
    $_SESSION["signIn"] = true;
    $_SESSION["admin"]["nama_admin"] = $nama;
    header("Location: home.php");
      exit;
  }
  $error = true;
  
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="main.css">
     <title> Login </title>
    </head>
  <body>
  <div class="container ">
    <div class="card p-2 mt-5 bg-info-subtle">
      <div class="position-absolute top-0 start-50 translate-middle">
      <img src="assets/Kedai perpus.png" alt="Kedai perpus" width="120px">
      </div>
      <h2 class="pt-5 text-center fw-bold">Log In</h2>
      <hr>
    <form action="" method="post" class="row g-3 p-4 needs-validation" novalidate>
    <label for="validationCustom01" class="form-label"> Username</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
    <input type="text" class="form-control" name="nama_admin" id="validationCustom01" required>
    <div class="invalid-feedback">
        Masukkan Nama anda!
    </div>
  </div>
  <label for="validationCustom02" class="form-label">Password</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
    <input type="password" class="form-control" id="validationCustom02" name="password" required>
    <div class="invalid-feedback">
        Masukkan Password anda!
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="signIn" > Log In</button>
    <a class="btn btn-success" href="index.php">Batal</a>
  </div>
</form>
</div>

<!-- untuk cek error -->
<?php if(isset($error)) : ?>
    <div class="alert alert-danger mt-2" role="alert">Nama atau Password Salah!</div>
<?php endif; ?>
  </div>
  
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

  </script>





<footer class="footer">
&copy; 2024 Kedai Perpus Dika. All rights reserved.

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>