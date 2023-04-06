<?php 
require "db.php";

$id_buku = $_POST['id_buku'];
$nama_buku = $_POST['nama_buku'];
$pengarang = $_POST['pengarang'];
$harga = $_POST['harga'];

$sql = "UPDATE buku SET nama_buku ='$nama_buku', pengarang ='$pengarang', harga ='$harga' WHERE id_buku ='$id_buku'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>
            alert('Edit Berhasil');
            location.href = 'data_buku.php';
    </script>";
} else {
    echo "<script>
            alert('Edit Gagal');
            location.href = 'data_buku.php';
    </script>";
}
?>