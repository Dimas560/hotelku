<?php
include '../includes/session_resepsionis.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>H.M</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../image/man.webp" />
  <link href="../css/bootstrap5.0.1.min.css" rel="stylesheet">
  <style>
    /*cuman bg gambar kota*/

    @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200');

    body {
      background-image: url('../image/thai.jpg');
      background-size: cover;
      -webkit-animation: slidein 20s;
      animation: slidein 20s;

      -webkit-animation-fill-mode: forwards;
      animation-fill-mode: forwards;

      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite;

      -webkit-animation-direction: alternate;
      animation-direction: alternate;
    }

    @-webkit-keyframes slidein {
      from {
        background-position: center;
        background-size: 2200px;
      }

      to {
        background-position: -15px 0px;
        background-size: 2950px;
      }
    }

    @keyframes slidein {
      from {
        background-position: center;
        background-size: 2200px;
      }

      to {
        background-position: -15px 0px;
        background-size: 2950px;
      }

    }



    .center {
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      margin: auto;
      center: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background: rgba(75, 75, 250, 0.3);
      border-radius: 3px;
    }

    .center h1 {
      text-align: center;
      color: white;
      font-family: 'Source Code Pro', monospace;
      text-transform: uppercase;
    }

    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');

    .honk-text {
      font-family: "Playfair Display", serif;
      font-optical-sizing: auto;
      font-weight: 500;
      font-style: normal;

    }

    .honk-text {
      animation: moveText 3s infinite alternate;
    }

    @keyframes moveText {
      from {
        transform: translateY(-10px);
      }

      to {
        transform: translateY(10px);
      }
    }

    .btn-primary:hover,
    .btn-danger:hover {
      transform: scale(1.1);
      transition: transform 2s ease;
    }

    .modal {
      animation: fadeIn 2s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }


    /* CSS untuk efek fade up */
    .fade-up {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .fade-up.active {
      opacity: 1;
      transform: translateY(0);
    }

    /* Animasi teks mengetik */
    .typewriter {
      overflow: hidden;
      /* Membuat efek teks mengetik terlihat */
      border-right: .15em solid orange;
      /* Garis imitasi kursor */
      white-space: nowrap;
      /* Mencegah teks turun ke baris baru */
      margin: 0 auto;
      /* Pusatkan teks */
      letter-spacing: .15em;
      /* Jarak antara karakter */
      animation: typing 3.5s steps(40, end),
        /* Animasi mengetik */
        blink-caret .75s step-end infinite;
      /* Animasi kursor */
    }

    /* Animasi untuk kursor */
    @keyframes typing {
      from {
        width: 0
      }

      to {
        width: 100%
      }
    }

    @keyframes blink-caret {

      from,
      to {
        border-color: transparent
      }

      50% {
        border-color: orange;
      }
    }
  </style>
</head>

<body>
  <div class="p-1 bg-dark text-white text-center">
    <h1 class="nav-link text-white honk-text">
      <!-- Teks animasi mengetik -->
      <span class="typewriter"></span>
    </h1>
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
              <option value="1"> Selesai Proses </option>
              <option value="0"> Sedang Proses </option>
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


  <!-- SCRIPT JAVASCRIPT -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap5.0.1.bundle.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      // Fungsi untuk menginisialisasi animasi teks
      function initializeTypewriter() {
        var text = "RECEPCIONIST SYSTEM MANAGEMENT";
        var speed = 150; // Kecepatan mengetik (ms)
        var i = 0;

        function typeWriter() {
          if (i < text.length) {
            document.querySelector('.typewriter').innerHTML += text.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
          } else {
            setTimeout(eraseText, 2000); // Tunggu 2 detik sebelum menghapus teks
          }
        }

        function eraseText() {
          if (i >= 0) {
            var tempText = text.substring(0, i);
            document.querySelector('.typewriter').innerHTML = tempText;
            i--;
            setTimeout(eraseText, speed);
          } else {
            i = 0;
            setTimeout(typeWriter, 1000); // Tunggu 1 detik sebelum mengetik lagi
          }
        }

        typeWriter(); // Mulai animasi
      }

      initializeTypewriter(); // Panggil fungsi inisialisasi saat dokumen siap
    });
    // Fungsi untuk menambahkan efek fade-up saat halaman dimuat pertama kali
    $(".fade-up").addClass("active");

    // Fungsi untuk menambahkan efek fade-up saat halaman di-refresh
    $(window).on("beforeunload", function() {
      $(".fade-up").removeClass("active");
    });

    // Load tabel saat halaman dimuat
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
          $("#data_table").html(data);
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
  </script>

  <div class="mt-0 p-0 bg-dark text-white text-center" style="height: 0vh;">
    <p></p>
  </div>
</body>

</html>