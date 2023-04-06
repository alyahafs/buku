<?php 
require "db.php";
$id_transaksi = $_POST['id_transaksi'];
$id_pelanggan = $_POST['id_pelanggan'];
$id_buku = $_POST['id_buku'];
$kuantitas = $_POST['kuantitas'];

$sql = "SELECT harga from buku WHERE id_buku = '$id_buku'";
$result = mysqli_query($conn, $sql);  
echo "<br>";

while ($row = mysqli_fetch_array($result)): 
    echo "<br>";
    $harga = $row['harga'];
    $total_harga =  $_POST['kuantitas']*$row['harga'];
endwhile; 
$query = "UPDATE transaksi SET id_pelanggan = '$id_pelanggan', id_buku = '$id_buku', kuantitas = '$kuantitas', harga = '$harga', total = '$total' WHERE id_transaksi = '$id_transaksi'";
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    echo "<script>
            alert('Edit Berhasil');
            location.href = 'data_transaksi.php';
    </script>";
} else {
    echo "<script>
            alert('Edit Gagal');
            location.href = 'data_transaksi.php';
    </script>";
}

?>