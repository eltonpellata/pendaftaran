<?php 
//koneksi data base yang beraada di file koneksi
require 'koneksi.php';
// tekan tombol submit apakah berhasil
if ( isset($_POST["submit"] ) ){

    //cara cek apakah data berhasil di tambahkan atau tidak
    if( tambah($_POST) > 0 ){
        echo "
            <script>
                alert('data berhasil di tambahkan');
                document.location.href = 'tabel.php';
            </script>
        ";
    }else {
        echo "
        <script>
            alert('data gagal di tambahkan');
            document.location.href = 'pendftaran.php';
        </script>
    ";
    }


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
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
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
                <a class="nav-link" href="about.php">About</a>
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
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
          <div class="input-group mb-2">
            <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ..." />
            <button type="submit" class="input-group-text bg-success text-light">
              <i class="fa fa-fw fa-search text-white"></i>
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="row p-5">
              <div class="col-lg-13 mb-0 d-flex align-items-center">
                <div class="text-align-left align-self-center">
                  <!-- tambah data -->
                  <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" id="inputEmail4" autocomplete="off" autofocus required >
                    </div>
                    <div class="col-md-6">
                      <label for="inputState" class="form-label">Jenis Kelamin</label>
                      <select id="inputState" name="jenisk" class="form-select" required >
                        <option selected>Pilihan...</option>
                        <option value="laki-laki">LAKI-LAKI</option>
                        <option value="Perempuan">PEREMPUAN</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="Tahun Ajaran" class="form-label">Tahun Ajaran</label>
                      <select id="Tahun Ajaran" name="tajaran" class="form-select" required >
                        <option selected>Pilihan...</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="Asal Sekolah" class="form-label">Asal Sekolah</label>
                      <input type="text" name="asekolah" class="form-control" id="Asal Sekolah" autocomplete="off" placeholder="Asal Sekolah..." required >
                    </div>
                    <div class="col-md-6">
                      <label for="Tempat Lahir" class="form-label">Tempat Lahir</label>
                      <input type="text" name="tlahir" class="form-control" id="Tempat Lahir" autocomplete="off" placeholder="Tempat Lahir..." required >
                    </div>
                    <div class="col-md-6">
                      <label for="Tanggal Lahir" class="form-label">Tanggal Lahir</label>
                      <input type="date" name="tglahir" class="form-control" id="Tanggal Lahir" required >
                    </div>
                    <div class="col-md-6">
                      <label for="Agama" class="form-label">Agama</label>
                      <select id="Agama" name="agama" class="form-select" required >
                        <option selected>Pilihan...</option>
                        <option value="Islam">Islam</option>
                        <option value="Prostestan">Prostestan</option>
                        <option value="Katholik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budah">budah</option>
                        <option value="Khonghucu">Khonghucu</option>
                      </select>
                    </div>
                    <!-- <div class="col-md-6">
                      <label for="Agama" class="form-label">Agama</label>
                      <input type="text" name="agama" class="form-control" id="Agama" required >
                    </div> -->
                    <div class="col-md-6">
                      <label for="Alamat Lengkap" class="form-label">Alamat Lengkap</label>
                      <input type="text" name="alengkap" class="form-control" id="Alamat Lengkap" autocomplete="off" placeholder="Alamat Lengkap..." required >
                    </div>
                    <div class="col-md-6">
                      <label for="Up Akte" class="form-label">Up Akte</label>
                      <input type="file" name="upakte" class="form-control" id="Up Akte" required >
                    </div>
                    <div class="col-md-6">
                      <label for="Up Kartu Keluarga" class="form-label">Up Kartu Keluarga</label>
                      <input type="file" name="upkk" class="form-control" id="Up Kartu Keluarga" required >
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-lg text-white">Submit</button>
                    <button type="reset" class="btn btn-secondary btn-lg">Reset</button>
                    <a class="btn btn-success" href="tabel.php">Lihat Data yang Sudah DiTambahkan</a>
                  </form>
                </div>
              </div>
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
              <h6 class="text-white font-monospace">JL.SULTAN BABULLAH NO.1.KOMPLEKS MESJID RAYA AMBON. KELURAHAN HUNIPOPU KEC. SIRIMAU 97128</h6>
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
