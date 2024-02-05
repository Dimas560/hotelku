<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin - Manhattan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../image/man.webp" />
    <link href="../css/bootstrap5.0.1.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

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
        <h1 class="nav-link text-white honk-text">ADMINISTRATOR SYSTEM MANAGEMENT</h1>
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


        });
    </script>



    <!-- END BODY -->
</body>

</html>