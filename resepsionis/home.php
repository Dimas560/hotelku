<?php
include '../includes/session_resepsionis.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>RESPSIONIS - HOTEL MANHATTAN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../image/man.webp" />
  <link href="../css/bootstrap5.0.1.min.css" rel="stylesheet">
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
  <div class="p-1 bg-dark text-white text-center">
    <h1 class="honk-text">RECEPCIONIST SYSTEM MANAGEMENT</h1>
  </div>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <h2 class="text-center honk-text">Data Reservasi</h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <h4><a class="nav-link honk-text" href="logout.php">Logout</a></h4>
          </li>
        </ul>


      </div>
    </div>
  </nav>

  <!--------------------------------------------- SCRIPT AWAL DATA RESERVASI ----------------------------------------------------------- -->
  <div class="container mt-5" id="data_reservasi">


    <div id="data_table">

    </div>


  </div>

  <!--------------------------------------------- SCRIPT AKHIR DATA  RESERVASI ----------------------------------------------------------- -->

  <!------------------------------ Script Awal Modal Lihat Reservasi------------------------------ -->
  <div class="modal fade" id="modal_lihat_reservasi">
    <div class="modal-dialog">
      <div class="modal-content">
        <input type="text" id="idpelanggan" value="3" hidden>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">Data Tamu</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div id="pelanngan" class="modal-body">

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <p class="text-center">@manhattan_exampleofficial</p>
        </div>

      </div>
    </div>
  </div>
  <!------------------------------ Script Akhir Modal Lihat Reservasi ------------------------------ -->

  <!----------------------------- Script Awal Modal Check Reservasi -------------------------------- -->
  <div class="modal fade" id="modal_check_reservasi">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reservasi</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-floating mt-2 mb-2">
            <select class="form-select mt-3" id="proses" name="proses">
              <option value="1"> Sudah Checkin </option>
              <option value="0"> Sedang Proses </option>
              <option value="3"> Batal </option>
            </select>
            <label for="idkamar">Proses</label>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="id_proses">Proses</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
        </div>

      </div>
    </div>
  </div>
  <!----------------------------- Script Akhir Modal Check Reservasi -------------------------------- -->

  <!-- SCRIPT FOOTER -->
  <div class="mt-5 p-2 bg-dark text-white text-center">
    <h5 class="honk-text">@manhattan_exampleofficial</h5>
  </div>

  <!-- SCRIPT JAVASCRIPT -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap5.0.1.bundle.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      load_table();

      function load_table() {
        var id = 0;
        $.ajax({
          url: "proses/load_table.php",
          method: "POST",
          data: {
            ids: id
          },
          success: function(data) {
            //alert(data);return;
            $("#data_table").html(data).refresh;
          }
        });
      }

      $("#id_proses").click(function() {
        var proses = $("#proses").val();
        var idproses = $("#id_proses").val();

        $.ajax({
          url: "proses/proses_check.php",
          method: "POST",
          data: {
            ids: idproses,
            proses: proses
          },
          success: function(data) {
            if (data == "OK") {
              alert("BERHASIL DIUBAH!");
              window.location.href = "home.php";
            }
            if (data == "ERROR") {
              alert("GAGAL DIUBAH!")
            }
          }
        });
      });

    });
  </script>

  <div class="mt-0 p-0 bg-dark text-white text-center" style="height: 0vh;">
    <p></p>
  </div>
</body>

</html>