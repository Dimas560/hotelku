<?php
//print_r($_POST);
include "includes/koneksi.php";
include 'includes/timezone.php';
$nama      = $_POST['nama'];
$email     = $_POST['email'];
$hp        = $_POST['hp'];
$tamu      = $_POST['tamu'];
$checkin   = date('Y-m-d H:i:s', strtotime($_POST['checkin']));
$checkout  = date('Y-m-d H:i:s', strtotime($_POST['checkout']));
$jkamar    = $_POST['jkamar'];
$idkamar   = $_POST['idkamar'];
$today = date('Y-m-d');

$today = date('Y-m-d H:i:s'); // Get current date and time
$sql = "INSERT INTO tb_pelanggan (nama_pemesan, email, hp, nama_tamu, tgl_pesan, checkin, checkout, jml_kamar, id_kamar) 
VALUES ('$nama','$email', '$hp', '$tamu', '$today', '$checkin', '$checkout', '$jkamar', '$idkamar')";

if ($conn->query($sql) == 1) {
	header("Location:bukti_pesan.php?nama=$nama&email=$email&hp=$hp&tamu=$tamu&checkin=$checkin&checkout=$checkout&jkamar=$jkamar&idkamar=$idkamar");
	exit; // Pastikan untuk keluar setelah mengirimkan header
}
