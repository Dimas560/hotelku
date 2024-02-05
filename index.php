<?php
include "includes/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href=" ../image/man.webp">
  <title>SELAMAT DATANG - HOTEL DIMZ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="man.webp" />
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet">
</head>

<body>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');

    .honk-text {
      font-family: "Playfair Display", serif;
      font-optical-sizing: auto;
      font-weight: 500;
      font-style: normal;

    }
  </style>
  <style>
    .navbar-nav {
      display: flex;
      align-items: center;
    }

    .navbar-nav .nav-item:first-child {
      margin-right: auto;
      margin-left: 0;
    }
  </style>

  <!------------------------------ISI BODY----------------------------- -->

  <!------------------AWAL BAGIAN HEADER----------------- -->
  <div class="p-2 bg-light text-black text-center">
    <h1 class="honk-text">MANHATTAN</h1>
    </p>
  </div>
  <!------------------AKHIR BAGIAN HEADER----------------- -->

  <!------------------------------AWAL BAGIAN NAVBAR(MENU)----------------------------- -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <button type="button" id="tombol_pesan" class="btn btn-outline-light honk-text btn-lg btn-xl">PESAN</button>
        </li>
        <li class="nav-item">
          <h5><a class="nav-link honk-text" href="../admin/index.php" id="admin_button">ADMIN?</a></h5>
        </li>
        <li class="nav-item">
          <h5><a class="nav-link honk-text" href="">Home</a></h5>
        </li>
        <li class="nav-item">
          <h5><a class="nav-link honk-text" href="#" id="tombol_kamar">Fasilitas Kamar</a></h5>
        </li>
        <li class="nav-item">
          <h5><a class="nav-link honk-text" href="#" id="tombol_fasilitas">Fasilitas Umum</a></h5>
        </li>
      </ul>
    </div>
  </nav>

  <!------------------------------AKHIR BAGIAN NAVBAR(MENU)----------------------------- -->


  <!------------------------------AWAL BAGIAN CAROUSEL(SLIDESHOW)----------------------------- -->
  <div id="demo_slide" class="carousel slide" data-bs-ride="carousel">
    <!-- INDIKATOR CAROUSEL -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
      <!-- Mulai Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
      <?php
      $aktif = "active";
      $sql = "SELECT * FROM tb_fasilitas_umum ORDER BY id DESC LIMIT 5";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        //membaca data pada baris tabel
        while ($row = $result->fetch_assoc()) {
          $nf = $row["nama_fasilitas"];
          $gambar = $row["gambar"];
          $ket = $row["keterangan"];
      ?>
          <div class="carousel-item <?php echo $aktif; ?> ">
            <img src="<?php echo $gambar; ?>" alt="Los Angeles" class="d-block" style="width:100%">
            <div class="carousel-caption">
              <h3><?php echo $nf; ?></h3>
              <p><?php echo $ket; ?></p>
            </div>
          </div>

      <?php
          $aktif = "";
        }
      }
      ?>
      <!-- Akhir Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->

      <!-- KONTROL TOMBOL KIRI DAN KANAN SLIDESHOW -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>

    </div>
  </div>
  <!------------------------------AKHIR BAGIAN CAROUSEL(SLIDESHOW)----------------------------- -->


  <!-- SCRIPT PEMESANAN -->
  <div class="container mt-4 col-sm-8" id="panel_pemesanan">
    <div class="card d-flex justify-content-center">
      <div class="card-body bg-dark">
        <div class="row bg-darky text-white">
          <h3 class="honk-text">Form Pemesanan</h3>
          <p class="honk-text">Silahkan memasukan data pada form ini untuk memulai pemesanan!</p>
        </div>
        <div class="row bg-white">
          <form id="form_pesan" action="pesan.php" method="post">
            <div class="row">
              <div class="col-sm form-floating mb-3 mt-3">
                <input type="datetime-local" class="form-control" id="masuk" name="checkin" value="<?php echo date('Y-m-d\TH:i'); ?>">
                <label for="masuk"> Check In</label>
              </div>
              <div class="col-sm form-floating mb-3 mt-3">
                <input type="datetime-local" class="form-control" id="keluar" name="checkout" value="<?php echo date('Y-m-d\TH:i'); ?>">
                <label for="keluar"> Check Out</label>
              </div>

              <div class="col-sm form-floating mb-3 mt-3">
                <input type="number" class="form-control" id="jkamar" name="jkamar">
                <label for="jkamar">Jumlah Kamar</label>
              </div>
            </div>
            <div class="form-floating mb-2 mt-3">
              <input type="text" class="form-control" id="nama" name="nama">
              <label for="nama">Nama Pemesanan</label>
            </div>
            <div class="form-floating mt-2 mb-2">
              <input type="email" class="form-control" id="email" name="email">
              <label for="pwd">Email</label>
            </div>
            <div class="form-floating mt-2 mb-2">
              <input type="text" class="form-control" id="hp" name="hp">
              <label for="hp">No. Telepon</label>
            </div>
            <div class="form-floating mt-2 mb-2">
              <input type="text" class="form-control" id="tamu" name="tamu">
              <label for="tamu">Nama Tamu</label>
            </div>
            <div class="form-floating mt-2 mb-2">
              <select class="form-select mt-3" id="idkamar" name="idkamar">
                <?php
                $sql = "SELECT * FROM tb_kamar";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  //membaca data pada baris tabel
                  while ($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row["id_kamar"]; ?>"> <?php echo $row["nama_kamar"]; ?> </option>
                <?php
                  }
                }
                ?>
              </select>
              <label for="idkamar">Tipe Kamar</label>
            </div>
            <div class="mt-3 mb-3">
              <button type="submit" id="konfirmasi" class="btn btn-outline-success">Konfirmasi Pemesanan</button>
              <button type="button" id="tombol_batal" class="btn btn-outline-danger">Batal</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- SCRIPT FASILITAS -->
  <div class="container mt-2" id="panel_fasilitas_kami">

    <!-- Mulai Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
    <?php
    $aktif = "active";
    $sql = "SELECT * FROM tb_fasilitas_umum ORDER BY id DESC LIMIT 5";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      //membaca data pada baris tabel
      while ($row = $result->fetch_assoc()) {
        $nf = $row["nama_fasilitas"];
        $gambar = $row["gambar"];
        $ket = $row["keterangan"];
    ?>

        <div class="container mt-4">
          <div class="card">
            <h5><?php echo $nf; ?></h5>
            <p><?php echo $ket; ?></p>
            <img class="img-fluid" max-width: 100%; height: auto; src="<?php echo $gambar; ?>" alt="Gambar">
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>

  <!-- SCRIPT KAMAR -->
  <div class="container mt-2 col-sm-7" id="panel_kamar">

    <div class="justify-content-center">
      <!-- Mulai Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
      <?php
      $sql = "SELECT * FROM tb_fasilitas_kamar ORDER BY id DESC LIMIT 5";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        //membaca data pada baris tabel
        while ($row = $result->fetch_assoc()) {
          $idk = $row["id_kamar"];
          $gambar = $row["gambar"];
          $fas = $row["fasilitas"];

          $sql2    = "SELECT nama_kamar FROM tb_kamar WHERE id_kamar= '$idk'";
          $result2 = $conn->query($sql2);
          $row2    = $result2->fetch_assoc();
      ?>

          <div class="card mt-2 mb-4">
            <div class="">
              <h5 class="card-title"><?php echo $row2["nama_kamar"]; ?> :</h5>
              <ul>
                <li><?php echo $fas; ?></li>
              </ul>
              <img class="img-fluid" src="<?php echo $gambar; ?>" alt="Card image">
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>

  <!-- SCRIPT TEANTANG KAMI -->


  </div>
  </div>

  <!-- SCRIPT FOOTER -->
  <div class="mt-10 p-0 bg-dark text-dark text-center">
    <div class="container mt-0">
      <div class="d-flex justify-content-center">
        <div class="row">
          <div class="col-sm form-floating mb-0 mt-0">

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="mt-8 p-2 bg-dark text-light text-center">
    <div class=" container mt-2" id="panel_tentang_kami">
      <div class="d-flex justify-content-center">
        <div class="row">
          <div class="col-sm-12 p-5">
            <h2 class="text-center honk-text">MANHATTAN?</h2>
            <p>

            <h5 class="honk-text" Hotel Dimas> Selamat datang di Hotel Kami, tempat kenyamanan bertemu gaya. Kami bangga memberikan keramahtamahan yang luar biasa dan menciptakan pengalaman tak terlupakan bagi para tamu kami.
              Terletak di jantung kota, hotel kami menawarkan akomodasi mewah dengan pemandangan cakrawala yang menakjubkan. Baik Anda bepergian untuk bisnis atau liburan, staf kami yang berdedikasi siap memastikan masa menginap Anda sempurna.
              Di Hotel Kami, kami percaya untuk melampaui harapan Anda. Dari kamar dan suite kami yang elegan hingga fasilitas kelas dunia dan layanan pribadi kami, setiap aspek masa tinggal Anda dipilih dengan cermat untuk memberikan Anda pengalaman yang benar-benar luar biasa.
              Temukan esensi kemewahan di Hotel Kami. Pesan penginapan Anda bersama kami hari ini dan biarkan kami menjadikan kunjungan Anda tak terlupakan.
          </div>
          <h2 class="honk-text">@manhattan_exampleofficial</h2>

          </h1>
          </p>
        </div>
      </div>
    </div>

    <!-- PANGGIL FILE JAVASCRIPT DARI FOLDER js -->
    <script src=" js/jquery.min.js"></script>
    <script src="js/bootstrap5.0.1.bundle.min.js"></script>
    <!-- <script src="crud_js/pesan.js"></script> -->

    <!------------------------------ AWAL KONDISI CODING JAVASCRIPT-------------------------------- -->
    <script>
      $(document).ready(function() {

        /*KONDISI SAAT WEBSITE DIJALANKAN PERTAMA KALI*/
        $('#panel_cek').hide();
        $('#panel_fasilitas_kami').hide();
        $('#panel_pemesanan').hide();
        $('#panel_tentang_kami').show();
        $('#panel_kamar').hide();

        /*KONDISI TOMBOL PESAN SEKARANG DI KLIK*/
        $("#tombol_pesan").click(function() {
          $('#panel_tentang_kami').hide();
          $('#panel_fasilitas_kami').hide();
          $('#panel_cek').show();
          $('#panel_pemesanan').show();
          $('#panel_kamar').hide();
          $('#demo_slide').hide();
        });

        /*KONDISI TOMBOL BATAL SAAT DI KLIK*/
        $("#tombol_batal").click(function() {
          $('#panel_cek').hide();
          $('#panel_fasilitas_kami').hide();
          $('#panel_pemesanan').hide();
          $('#panel_tentang_kami').show();
          $('#demo_slide').show();
          $('#panel_kamar').hide();
        });

        /*KONDISI TOMBOL BATAL SAAT DI KLIK*/
        $("#tombol_fasilitas").click(function() {
          $('#panel_cek').hide();
          $('#panel_fasilitas_kami').show();
          $('#panel_pemesanan').hide();
          $('#panel_tentang_kami').hide();
          $('#panel_kamar').hide();
          $('#demo_slide').hide();
        });
        /*KONDISI TOMBOL BATAL SAAT DI KLIK*/
        $("#tombol_kamar").click(function() {
          $('#panel_cek').hide();
          $('#panel_fasilitas_kami').hide();
          $('#panel_pemesanan').hide();
          $('#panel_tentang_kami').hide();
          $('#panel_kamar').show();
          $('#demo_slide').hide();
        });

      });
    </script>
    <!------------------------------ AWAL KONDISI CODING JAVASCRIPT-------------------------------- -->

</body>
<!-- END BODY -->

</html>