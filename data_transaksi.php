<?php 
require "db.php";

$sql = "SELECT transaksi.id_transaksi, transaksi.kuatitas, transaksi.harga, transaksi.total, pelanggan.id_pelanggan, pelanggan.nama_pelanggan, buku.id_buku, buku.nama_buku FROM pelanggan INNER JOIN transaksi on pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN buku ON buku.id_buku = transaksi.id_buku ORDER by id_transaksi";

$result = mysqli_query($conn, $sql);
  
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto+Condensed&display=swap"
      rel="stylesheet"
    />
</head>

<body>
<nav>
    <ul>
        <li><a href="welcome.php">Beranda</a></li>
        <li><a href="data_barang.php">Data Barang</a></li>
        <li><a href="data_pembeli.php">Data Pembeli</a></li>
        <li><a href="data_transaksi.php">Data Transaksi</a></li>
    </ul>
</nav>
<div class="container">
    <h2>Data Transaksi</h2>
    <a href="form_transaksi.php?" class="add-button">Tambah Data Transaksi</a>
    <table>
        <tr>
            <th class="aksi">Id Transaksi</th>
            <th>Nama Pembeli</th>
            <th>Nama Barang</th>
            <th>jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($result)): 
            $total = $row['kuantitas']*$row['harga'] 
        ?> 
        <tr>
            <td class="center-align"><?=$row['id_transaksi']?></td>
            <td><?=$row['nama_pelanggan']?></td>
            <td><?=$row['nama_buku']?></td>
            <td><?=$row['kuantitas']?></td>
            <td><?=$row['harga']?></td>
            <td ><?=$total ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>