<?php 
require "db.php";

$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];

$sql = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', email='$email', no_hp='$no_hp' WHERE id_pelanggan='$id_pelanggan'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>
            alert('Edit Berhasil');
            location.href = 'data_pelanggan.php';
    </script>";
} else {
    echo "<script>
            alert('Edit Gagal');
            location.href = 'data_pelanggan.php';
    </script>";
}

?>