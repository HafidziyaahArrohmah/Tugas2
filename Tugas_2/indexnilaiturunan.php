<?php
//menginclude file koneksi.php
include('koneksi.php');
//membuat objek (instansi) dari kelas database
$db = new Database();
//membuat objek (instansi) dari kelas nilaiTurunan dengan objek Database
$nilaiturunan = new nilaiTurunan($db);

//menetapkan kriteria untuk filter data (semester_id = 1)
$kriteria ="semester_id = 1";
//mengambil data nilai turunan berdasarkan kriteria
$data_nilaiturunan = $nilaiturunan->tampilDataNilai($kriteria);
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
    <h2>Data Nilai Turunan</h2>
      <table class="table table-striped">
        <tr>
            <th>ID Nilai</th>
            <th>Nilai</th>
            <th>Nilai Akhir</th>
            <th>ID Mahasiswa</th>
            <th>ID Mata Kuliah</th>
            <th>ID Semester</th>
        </tr>
        <?php
        foreach($data_nilaiturunan as $row) { //foreach untuk menampilkan data
        ?>
        <tr>
            <td><?php echo $row['nilai_id']; ?></td> <!-- mengambil data dari kolom nilai_id -->
            <td><?php echo $row['nilai']; ?></td> <!-- mengambil data dari kolom nilai -->
            <td><?php echo $row['nilai_akhir']; ?></td> <!-- mengambil data dari kolom nilai_akhir -->
            <td><?php echo $row['mahasiswa_id']; ?></td> <!-- mengambil data dari kolom mahasiswa_id -->
            <td><?php echo $row['matkul_id']; ?></td> <!-- mengambil data dari kolom matkul_id -->
            <td><?php echo $row['semester_id']; ?></td> <!-- mengambil data dari kolom semester_id -->
        </tr>
        <?php
        }
        ?>
    <table>
</body>
</html>