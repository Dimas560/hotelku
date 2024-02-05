<?php
include "../../includes/koneksi.php";

$id = $_POST['idp'];

/* CARI NAMA GAMABAR */
$sql = "SELECT * FROM tb_fasilitas_kamar WHERE id_kamar='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        /* HAPUS FILE GAMBAR FASILITAS KAMAR */
        unlink('../../' . $row['gambar']);
    }
}

$sql  = "DELETE FROM tb_kamar WHERE id_kamar = '$id'";
$sql2 = "DELETE FROM tb_fasilitas_kamar WHERE id_kamar = '$id'";

if (($conn->query($sql) === TRUE) && ($conn->query($sql2) === TRUE)) {
    $data = "OK";
    echo $data;
} else {
    $data = "ERROR";
    echo $data;
}
