<?php 
require "db.php";
$id_buku = $_POST['id_buku'];
$id_pelanggan = $_POST['id_pelanggan'];
$kuantitas= $_POST['kuantitas'];

$query = mysqli_query($conn, "SELECT harga from buku WHERE id_buku = '$id_buku'");
while ($row = mysqli_fetch_array($query)):
    $harga = $row['harga'];
    $total_harga =  $_POST['kuantitas']*$row['harga'];
endwhile;

$sql = "INSERT INTO transaksi VALUES (null, '$id_buku', '$id_pelanggan', '$kuantitas', '$harga', '$total_harga')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>
            alert('Tambah Berhasil');
            location.href = 'data_transaksi.php';
    </script>";
} else {
    echo "<script>
            alert('Tambah Gagal');
            location.href = 'data_transaksi.php';
    </script>";
}
?>