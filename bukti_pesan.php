<?php
// Ambil data dari URL
$nama      = isset($_GET['nama']) ? $_GET['nama'] : '';
$email     = isset($_GET['email']) ? $_GET['email'] : '';
$hp        = isset($_GET['hp']) ? $_GET['hp'] : '';
$tamu      = isset($_GET['tamu']) ? $_GET['tamu'] : '';
$checkin   = isset($_GET['checkin']) ? $_GET['checkin'] : '';
$checkout  = isset($_GET['checkout']) ? $_GET['checkout'] : '';
$jkamar    = isset($_GET['jkamar']) ? $_GET['jkamar'] : '';
$idkamar   = isset($_GET['idkamar']) ? $_GET['idkamar'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../image/man.webp">
    <title><?php echo "Manhattan - " . $nama; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="man.webp" />
    <link rel="shortcut icon" type="image/yow.jpg/x-icon" href="man.webp" />
    <link href="css/bootstrap5.0.1.min.css" rel="stylesheet">
    <link href="css/style_bukti_pesan.css" rel="stylesheet">
    <style>
        @media print {

            /* Sembunyikan tombol cetak saat mencetak */
            #printInvoice {
                display: none;
            }

            /* Sembunyikan link sumber */
            .hidden-print {
                display: none !important;
            }

            /* Sembunyikan footer pada saat mencetak */
            .hidden-source-link {
                display: none !important;
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
    </style>
    <!--Author: @arboshiki-->
    <div id="invoice">
        <div class="toolbar hidden-print">
            <div class="text-right">
                <a href="index.php?" class="btn btn-outline-dark"><i class="fa fa-print"></i>Kembali</a>
                <button id="printInvoice" class="btn btn-outline-dark"><i class="fa fa-file-pdf-o"></i>Cetak Sebagai PDF</button>
            </div>
            <hr>
        </div>
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div style="display: flex; align-items: center;">
                        <img src="../image/man.webp" class="rounded-circle" alt="" width="250" height="250">
                        <h1 style="margin-left: 20px; text-transform: uppercase;">RESERVATION COMPLETE</h1>
                    </div>
                </header>
                <main>
                    <!-- Main content -->
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama:</td>
                                <td><?php echo $nama; ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <td>Nomor HP:</td>
                                <td><?php echo $hp; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Tamu:</td>
                                <td><?php echo $tamu; ?></td>
                            </tr>
                            <tr>
                                <td>Check-in:</td>
                                <td><?php echo $checkin; ?></td>
                            </tr>
                            <tr>
                                <td>Check-out:</td>
                                <td><?php echo $checkout; ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Kamar:</td>
                                <td><?php echo $jkamar; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </main>
                <footer class="source-link">
                    Bukti pemesanan kamar Hotel - Manhattan.
                    <hr style="border: 9; border-top: 10px solid black; margin-top: 20px;">
                </footer>
            </div>
            <div></div>
        </div>
    </div>

    <!-- Panggil file JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap5.0.1.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Munculkan modal notifikasi saat halaman dimuat
            $('#notificationModal').modal('show');

            $('#printInvoice').click(function() {
                // Dapatkan waktu saat ini
                var currentDate = new Date();
                var day = currentDate.getDate();
                var month = currentDate.getMonth() + 1;
                var year = currentDate.getFullYear();
                var hours = currentDate.getHours();
                var minutes = currentDate.getMinutes();

                // Format waktu
                var currentTime = hours + ':' + minutes + ' - ' + day + '/' + month + '/' + year;

                // Tambahkan waktu ke dalam dokumen sebelum mencetak
                $('#invoice').append('<p style="text-align: right; margin-right: 20px;">Printed on: ' + currentTime + '</p>');

                // Cetak dokumen
                window.print();
            });
        });
    </script>

    <!-- Modal Notifikasi -->
    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">RESERVASI BERHASIL!</h5>
                    </button>
                </div>
                <div class="modal-body">
                    Selamat! Reservasi Anda telah berhasil. Terima kasih telah memilih Hotel Manhattan.
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</body>

</html>