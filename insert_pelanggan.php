<?php 
require "db.php";

$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$email = $_POST['email'];

$no_hp = $_POST['no_hp'];
$sql = "INSERT INTO pelanggan VALUES ('', '$nama_pelanggan', '$email','$no_hp')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>
            alert('Tambah Berhasil');
            location.href = 'data_pelanggan.php';
    </script>";
} else {
    echo "<script>
            alert('Tambah Gagal');
            location.href = 'data_pelanggan.php';
    </script>";
}
?>