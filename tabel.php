<?php 
//koneksi data base yang beraada di file koneksi
require 'koneksi.php';
//munculkan data base dengan fungsion yang ad di file koneksi
$daftar = query("SELECT * FROM tb_pendaftaran ORDER BY id DESC");

//$daftar = query("SELECT * FROM tb_pendaftaran ORDER BY id ASC");
// ACS itu megurutkan dari id yang kecil sampai ke besar
//$daftar = query("SELECT * FROM tb_pendaftaran ORDER BY id DESC");
// DESC itu mengurutkan dari yang besar ke kecil

//tombol cari
if( isset($_POST["submit"]) ){
  $daftar = cari ($_POST["keyword"]);

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MA Alfatah Ambon</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png" />


    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/templatemo.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  </head>

  <body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
      <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html"> MA Alfatah Ambon</a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
          <div class="flex-fill">
            <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pendftaran.php">Pendaftaran Siswa Baru</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>
    </div>

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="row p-5 ">
              <a class="btn btn-success" href="pendftaran.php">Kembali</a>
              <!-- tombol cari -->
              <form class="row g-3" action="" method="POST">
              <div class="col-auto">
                <input type="text" name="keyword" class="form-control" placeholder="search...." autocomplete="off" autofocus>
              </div>
              <div class="col-auto">
                <button type="submit" name="submit" class="btn btn-success mb-3">Submit</button>
              </div>
            </form>
            <!-- akir tombol cari -->
<!-- tabel -->
    <table class="table table-secondary table-bordered caption-top text-center ">
    <caption >
        <h1 style="color:green;"><strong><i style="color:green;" class="bi bi-journal-check"></i>Tabel Pendaftaran</strong></h1>
    </caption> 
    <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Tahun Ajaran</th>
          <th scope="col">Tempat Lahir</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Asal Sekolah</th>
          <th scope="col">agama</th>
          <th scope="col">Alamat</th>
          <th scope="col">up akte</th>
          <th scope="col">up kk</th>
          <th scope="col">aksi</th>
        </tr>
      </thead>
      <tbody>
          <?php $i = 1; ?>
          <?php foreach( $daftar as $row ) : ?>
        <tr>
            <th><?= $i; ?></th>
            <td><?= $row ["nama"]; ?></td>
            <td><?= $row ["jenisk"]; ?></td>
            <td><?= $row["tajaran"]; ?></td>
            <td><?= $row["tlahir"]; ?></td>
            <td><?= $row["tglahir"]; ?></td>
            <td><?= $row["asekolah"]; ?></td>
            <td><?= $row["agama"]; ?></td>
            <td><?= $row["alengkap"]; ?></td>
            <!-- pemaggilan untuk gambar -->
            <td><img src="img/<?= $row["upakte"]; ?>" width="50"></td>
            <td><img src="img/<?= $row["upkk"]; ?>" width="50"></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>"><i style="color:green;" class="bi bi-pencil-square"></i></a>
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Dihapus Datanya?');"><i style="color:red;" class="bi bi-trash2-fill"></i></a>
          </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
      </tbody>
    </table>
    <!-- tabel -->
                </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
      <div class="w-100 bg-black py-3">
        <div class="container">
          <div class="row pt-2">
            <div class="col-12">
              <p class="text-left text-light">Copyright &copy; 2021 MA Alfatah Ambon | Wia</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
  </body>
</html>
