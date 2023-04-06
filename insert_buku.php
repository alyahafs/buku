<?php 
require "db.php";

$nama_buku = $_POST['nama_buku'];
$pengarang = $_POST['pengarang'];
$harga = $_POST['harga'];
  
$sql = "INSERT INTO buku VALUES ('', '$nama_buku', '$pengarang', '$harga')";

$result = mysqli_query($conn, $sql );
if ($result) {
    echo "<script>
            alert('Tambah Berhasil');
            location.href = 'data_buku.php';
    </script>";
} else {
    echo "<script>
            alert('Tambah Gagal');
            location.href = 'data_buku.php';
    </script>";
}
?>                               