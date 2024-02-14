<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="../image/man.webp">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap5.0.1.min.css" rel="stylesheet">
  <style>
    /*cuman bg gambar kota*/

    @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200');

    body {
      background-image: url('../image/zzz.jpg');
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
        background-size: 2000px;
      }

      to {
        background-position: -15px 0px;
        background-size: 2750px;
      }
    }

    @keyframes slidein {
      from {
        background-position: center;
        background-size: 2000px;
      }

      to {
        background-position: -15px 0px;
        background-size: 2350px;
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



    /* CSS untuk efek fade-in dan fade-out */
    .fade-in {
      opacity: 0;
      animation: fadeIn ease-in 1s forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .fade-out {
      opacity: 1;
      animation: fadeOut ease-out 1s forwards;
    }

    @keyframes fadeOut {
      from {
        opacity: 1;
      }

      to {
        opacity: 0;
      }
    }

    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');

    body {
      font-family: "Playfair Display", serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container-fluid {
      max-width: 400px;
      width: 100%;
      padding: 20px;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .login-header h2 {
      margin-bottom: 10px;
      font-size: 24px;
      color: #1877f2;
    }

    .login-container form {
      margin-bottom: 20px;
    }

    .form-control {
      border: 1px solid #dddfe2;
      border-radius: 5px;
      padding: 12px;
      margin-bottom: 20px;
    }

    .btn-login {
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 12px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
    }

    .footer-text {
      text-align: center;
    }

    .footer-text a {
      color: #000;
      text-decoration: none;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }

    .honk-text {
      font-family: "Playfair Display", serif;
      font-optical-sizing: auto;
      font-weight: 500;
      font-style: normal;
    }
  </style>
</head>

<body>

  <div class="container-fluid fade-in">
    <div class="login-header">
      <img src="../image/man.png" alt="Man Image" style="width: 275px; height: 100px;">
    </div>
    <form id="flogin" class="login-container">
      <div class="mb-3">
        <input type="text" class="form-control" id="username" placeholder="Username Resepsionis">
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" id="password" placeholder="Password Resepsionis">
      </div>
      <button type="button" id="proses_login" class="btn btn-login">Log In</button>
    </form>
    <div class="footer-text">
      <a href="../index.php" id="kembali" style="color: #000;">kembali?</a> | <a href="../admin/index.php" id="admin" style="color: #000;">Admin?</a>
    </div>
  </div>
  <div class="wind-animation"></div>

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap5.0.1.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#proses_login").click(function() {
        var user = $("#username").val();
        var pass = $("#password").val();
        if ((user == "") || (pass == "")) {
          Swal.fire({
            icon: 'warning',
            title: 'Field belum diisi!',
            text: 'Mohon lengkapi semua field!',
          });
          return;
        }
        $.ajax({
          url: "proses/login_resepsionis.php",
          method: "POST",
          data: {
            username: user,
            password: pass
          },
          success: function(data) {
            if (data == "OK") {
              Swal.fire({
                icon: 'success',
                title: 'Login Berhasil!',
                text: 'Hai Resepsionis!',
              }).then(function() {
                window.location.href = "home.php";
              });
            } else {
              document.getElementById("flogin").reset();
              Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan!',
                text: 'Error Username dan Password!',
              }).then(function() {
                // Mengarahkan pengguna kembali ke halaman indeks setelah pesan kesalahan ditampilkan
                setTimeout(function() {
                  window.location.href = "../resepsionis/index.php";
                }, 2000); // Delay 2 detik sebelum mengarahkan kembali ke halaman indeks
              });
            }
          }
        });
        $(".container-fluid").addClass("fade-out"); // Tambah class fade-out
      });

      // Tambahkan event listener untuk tombol "Kembali?"
      $("#kembali").click(function(event) {
        event.preventDefault(); // Hindari aksi default dari link
        $(".container-fluid").addClass("fade-out"); // Tambah class fade-out
        setTimeout(function() {
          window.location.href = $("#kembali").attr("href");
        }, 1000); // Adjust the delay as needed (1000 milliseconds = 1 second)
      });

      // Tambahkan event listener untuk tombol "Admin?"
      $("#admin").click(function(event) {
        event.preventDefault(); // Hindari aksi default dari link
        $(".container-fluid").addClass("fade-out"); // Tambah class fade-out
        setTimeout(function() {
          window.location.href = $("#admin").attr("href");
        }, 1000); // Adjust the delay as needed (1000 milliseconds = 1 second)
      });
    });
  </script>

</body>

</html>