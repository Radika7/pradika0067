<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sistem Perpustakaan </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>

  <!-- Iki navbar -->
  <nav class="navbar fixed-top navbar-expand-lg bg-info shadow-sm justify-space-between">
  <div class="container-fluid">
    <img src="assets/Kedai perpus.png" alt="Kedai perpus" width="120px">
    <a href="login.php" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#homeSection"> Beranda </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#aboutSection"> Tentang </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#footer"> Kontak </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br><br><br><br><br><br><br>
<h1> Selamat Datang Di Persputakaan SMK Taman Siswa Padang </h1>

<!-- Date and Time -->
<div id="dateTime"></div>

<script>
    function updateDateTime() {
        const dateTimeElement = document.getElementById('dateTime');
        const now = new Date();

        const options = {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
            hour: '2-digit', minute: '2-digit', second: '2-digit'
        };

        dateTimeElement.textContent = now.toLocaleDateString('en-US', options);
    }

    setInterval(updateDateTime, 1000);
    updateDateTime();
  
</script>
   <!-- Tombol login ke link login.php -->
<div class="button-container">
    <a href="login.php" class="login-button text-align-center">
        <img src="Assets/gembok.png" alt="gembok" width="50px">
            <span>Login</span>
        </a>
    </div>

    <footer class="footer">
    &copy; 2024 Kedai Perpus Dika. All rights reserved.

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>