<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="../image/man.webp">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap5.0.1.min.css" rel="stylesheet">
  <style>
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
      /* Ubah warna teks menjadi hitam */
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

  <div class="container-fluid">
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
      <a href="../index.php" style="color: #000;">kembali?</a> | <a href="../admin/index.php" style="color: #000;">Admin?</a>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap5.0.1.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#proses_login").click(function() {
        var user = $("#username").val();
        var pass = $("#password").val();
        if ((user == "") || (pass == "")) {
          alert("Field belum diisi!");
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
              alert("Login Berhasil! Hai Resepsionis!");
              window.location.href = "home.php";
            }
            if (data == "ERROR") {
              document.getElementById("flogin").reset();
              alert("Terjadi kesalahan! Error Username dan Password");
            }
          }
        });
      });
    });
  </script>
</body>

</html>