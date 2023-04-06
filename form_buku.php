<?php 
require "db.php";

if (isset($_GET['id_buku'])){
    $id_buku = $_GET['id_buku'];
} else
    $id_buku = 0;

if ($id_buku > 0) {
    $sql = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)):
        $id_buku = $row['id_buku'];
        $nama_buku = $row['nama_buku'];
        $pengarang = $row['pengarang'];
        $harga = $row['harga'];
    endwhile;
    $form_action = 'edit_buku.php';
    $title = "Edit Data Buku";
}
else {
    $id_buku = '';
    $nama_buku = '';
    $pengarang = '';
    $harga = '';
    $form_action = 'insert_buku.php';
    $title = "Tambah Data Buku";
}
?>

<!DOCTYPE html> 
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
        <li><a href="data_buku.php">Data Buku</a></li>
        <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
        <li><a href="data_transaksi.php">Data Transaksi</a></li>
    </ul>
</nav>
    <h2 style="margin-bottom:20px"><?=$title; ?></h2>
    <form action="<?=$form_action?>" method="post">
        <input type="hidden" name="id_buku" value="<?=$id_buku?>" />
        <label for="nama_buku">Nama Buku</label>
        <input type="text" name="nama_buku" value="<?=$nama_buku?>"/><br>
        <label for="pengarang">Pengarang</label>
        <input type="text" name="pengarang" value="<?=$pengarang?>" /><br>
        <label for="harga">Harga</label>
        <input type="number" name="harga" value="<?=$harga?>"/><br>
        <input type="submit" value="Simpan"/>
    </form>
</body>
</html>