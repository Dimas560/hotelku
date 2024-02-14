<!DOCTYPE html>
<html lang="en">

<head>
    <title>H.M</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../image/man.webp" />
    <link href="../css/bootstrap5.0.1.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200');

        body {
            background-image: url('../image/lol.jpg');
            background-size: cover;
            -webkit-animation: slidein 25s;
            animation: slidein 24s;

            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;

            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;

            -webkit-animation-direction: alternate;
            animation-direction: alternate;
        }

        @-webkit-keyframes slidein {
            from {
                background-position: top;
                background-size: 2650px;
            }

            to {
                background-position: -100px 0px;
                background-size: 2450px;
            }
        }

        @keyframes slidein {
            from {
                background-position: top;
                background-size: 2650px;
            }

            to {
                background-position: -100px 0px;
                background-size: 2450px;
            }

        }



        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            margin: auto;
            top: 0;
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

        .btn-primary:hover,
        .btn-danger:hover {
            transform: scale(1.1);
            transition: transform 1s ease;
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');

        .honk-text {
            font-family: "Playfair Display", serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;

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

        .btn-primary:hover,
        .btn-danger:hover {
            transform: scale(1.1);
            transition: transform 1s ease;
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
    </style>
    <div class="p-1 bg-dark text-white text-center">
        <h1 class="nav-link text-white honk-text">
            <!-- Teks animasi mengetik -->
            <span class="typewriter"></span>
        </h1>
    </div>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <h5><a class="nav-link honk-text" href="#" id="tombol_kamar">Kamar</a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link honk-text" href="#" id="tombol_fasilitas">Fasilitas Kamar</a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link honk-text" href="#" id="tombol_fasilitas_umum">Fasilitas Umum</a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link honk-text" href="logout.php" id="">Logout</a></h5>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <div id="data">

    </div>





    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap5.0.1.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Fungsi untuk menginisialisasi animasi teks
            function initializeTypewriter() {
                var text = "ADMINISTRATOR SYSTEM MANAGEMENT";
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
        var dataTable = null;

        // Function to initialize DataTables
        function initializeDataTables() {
            dataTable = $('#myTable').DataTable({
                "paging": false, // Disable built-in pagination
                // Add other options as needed
            });
        }

        // Function to handle delete button click
        $(".delete-button").on("click", function() {
            var id = $(this).data("id");
            if (confirm("Are you sure you want to delete this item?")) {
                $.ajax({
                    type: "POST",
                    url: "proses/delete_kamar.php",
                    data: {
                        idp: id
                    },
                    success: function(response) {
                        if (response === "OK") {
                            // Refresh the content of home.php
                            loadHomeContent();
                            alert("Item deleted successfully!");
                        } else {
                            alert("Error deleting data.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Error deleting data.");
                    }
                });
            }
        });
        // Function to handle page navigation
        $("#prevPage").on("click", function() {
            dataTable.page('previous').draw('page');
        });

        $("#nextPage").on("click", function() {
            dataTable.page('next').draw('page');
        });

        function loadHomeContent() {
            var id = 0;
            $.ajax({
                url: "home.php",
                method: "POST",
                data: {
                    ids: id
                },
                success: function(data) {
                    $("#data").html(data);
                }
            });
        }

        // Function to handle delete button click
        $(".delete-button").on("click", function() {
            var id = $(this).data("id");
            if (confirm("Are you sure you want to delete this item?")) {
                $.ajax({
                    type: "POST",
                    url: "proses/delete_kamar.php",
                    data: {
                        idp: id
                    },
                    success: function(response) {
                        if (response === "OK") {
                            // No need to reload the page
                            // The item will be removed from the UI
                        } else {
                            alert("Error deleting data.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Error deleting data.");
                    }
                });
            }
        });

        if (window.location.href.indexOf('home.php?id=fasilitas_kamar') > -1) {
            load_fasilitas_kamar();
        } else
        if (window.location.href.indexOf('home.php?id=fasilitas_umum') > -1) {
            load_fasilitas_umum();
        } else
        if ((window.location.href.indexOf('home.php?id=kamar') > -1) ||
            (window.location.href.indexOf('/') > -1)) {
            load_kamar();
        }

        /*tombol tambah(+) fasilitas*/
        $("#add_fasilitas").click(function() {
            $("#modal_tambah_fasilitas").modal('show');
        });

        /*tombol tambah(+) fasilitas umum*/
        $("#add_fasilitas_umum").click(function() {
            $("#modal_tambah_fasilitas_umum").modal('show');
        });

        /*Saat klik tombol Menu Kamar*/
        $("#tombol_kamar").click(function() {
            load_kamar();
        });

        /*Saat klik tombol Menu Fasilitas kamar*/
        $("#tombol_fasilitas").click(function() {
            load_fasilitas_kamar();
        });

        /*Saat klik tombol Menu Fasilitas Umum*/
        $("#tombol_fasilitas_umum").click(function() {
            load_fasilitas_umum();
        });

        $("#show_kamar").click(function() {
            $("#lihat_data_kamar").modal("show");
        });

        $("#show_fasilitas").click(function() {
            $("#lihat_data_fasilitas").modal("show");
        });

        $("#show_fasilitas_umum").click(function() {
            $("#lihat_data_fasilitas_umum").modal("show");
        });
        $(".delete-button").on("click", function() {
            var id = $(this).data("id");
            if (confirm("Are you sure you want to delete this item?")) {
                deleteAndRefresh(id);
            }
        });

        function load_kamar() {
            var id = 0;
            $.ajax({
                url: "proses/load_kamar.php",
                method: "POST",
                data: {
                    ids: id
                },
                success: function(data) {
                    //alert(data);return;
                    $("#data").html(data).refresh;
                }
            });
        }

        function load_fasilitas_kamar() {
            var id = 0;
            $.ajax({
                url: "proses/load_fasilitas.php",
                method: "POST",
                data: {
                    ids: id
                },
                success: function(data) {
                    //alert(data);return;
                    $("#data").html(data).refresh;
                }
            });
        }

        function load_fasilitas_umum() {
            var id = 0;
            $.ajax({
                url: "proses/load_fasilitas_umum.php",
                method: "POST",
                data: {
                    ids: id
                },
                success: function(data) {
                    //alert(data);return;
                    $("#data").html(data).refresh;
                }
            });
        }
        // Function to handle deletion and refreshing
        function deleteAndRefresh(id) {
            $.ajax({
                type: "POST",
                url: "proses/delete_kamar.php",
                data: {
                    idp: id
                },
                success: function(response) {
                    if (response === "OK") {
                        // Reload the current page after deletion
                        window.location.reload();
                    } else {
                        alert("Error deleting data.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Error deleting data.");
                }
            });
        }
    </script>



    <!-- END BODY -->
</body>

</html>