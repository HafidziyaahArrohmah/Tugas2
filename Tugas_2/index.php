<?php

//menginclude file koneksi.php untuk mendapatkan akses ke kelas Database
include('koneksi.php');

//membuat objek (instansi) dari kelas Database
$db = new Database();

//mengambil data mahasiswa dengan memanggil metod tampilData()
$data_mahasiswa = $db->tampilData();
?>
<!DOCTYPE html>
<!-- html untuk membuat tampilan halaman web -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Tugas 2</title>
</head>
<body>

<!-- navbar untuk membuat pintasan menu -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Data Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="indexnilai.php">Data Nilai</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="indexturunan.php">Data Mahasiswa Turunan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="indexnilaiturunan.php">Data Nilai Turunan</a>
            </li>
            <!-- navbar dropdown untuk pintasan menu -->
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="index.php">Data Mahasiswa</a></li>
                <li><a class="dropdown-item" href="indexnilai.php">Data Nilai</a></li>
                <li><a class="dropdown-item" href="indexturunan.php">Data Mahasiswa Turunan</a></li>
                <li><a class="dropdown-item" href="indexnilaiturunan.php">Data Nilai Turunan</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-3">
      <h2> Data Mahasiswa </h2>
      <table class="table table-striped">
        <tr>
            <th>ID Mahasiswa</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Telepon</th>
        </tr>
        <?php
        foreach($data_mahasiswa as $row) { //foreach untuk menampilkan data
        ?>
        <tr>
            <td><?php echo $row['mahasiswa_id']; ?></td> <!-- mengambil data dari kolom mahasiswa_id -->
            <td><?php echo $row['nim']; ?></td> <!-- mengambil data dari kolom nim -->
            <td><?php echo $row['nama']; ?></td> <!-- mengambil data dari kolom nama -->
            <td><?php echo $row['alamat']; ?></td> <!-- mengambil data dari kolom alamat -->
            <td><?php echo $row['email']; ?></td> <!-- mengambil data dari kolom email -->
            <td><?php echo $row['no_telp']; ?></td> <!-- mengambil data dari kolom no_telp -->
        </tr>
        <?php
        }
        ?>
    <table>
</body>
</html>