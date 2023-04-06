<?php
 require "db.php";
 $result_pelanggan = mysqli_query($conn, "SELECT id_pelanggan, nama_pelanggan FROM pelanggan");
 $result_buku = mysqli_query($conn, "SELECT id_buku, nama_buku, harga FROM buku");
 
 $options_pelanggan = mysqli_fetch_all($result_pelanggan, MYSQLI_ASSOC );
 $options_buku = mysqli_fetch_all($result_buku, MYSQLI_ASSOC );

if (isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];
} else {
    $id_transaksi = 0;
}

 if ($id_transaksi > 0) {
    $sql = "SELECT transaksi.id_transaksi, pelanggan.id_pelanggan, buku.id_buku, pelanggan.nama_pelanggan, buku.nama_buku, transaksi.kuantitas, transaksi.harga, transaksi.total FROM pelanggan INNER JOIN transaksi ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN buku ON buku.id_buku = transaksi.id_buku WHERE transaksi.id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);    
    while ($row = mysqli_fetch_array($result)):
        $id_pelanggan = $row['id_pelanggan'];
        $id_buku = $row['id_buku'];
        $nama_pelanggan = $row['nama_pelanggan'];
        $nama_buku = $row['nama_buku'];
        $kuantitas = $row['kuantitas'];
    endwhile;
        $form_action = "edit_transaksi.php";
        $title = "Edit Data Transaksi";
} else {
        $id_pelanggan = '';
        $id_buku = '';
        $nama_pelanggan = '';
        $nama_buku = '';
        $kuantitas = '';
        $form_action = "insert_transaksi.php";
        $title = "Tambah Data Transaksi";
}   

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
            <li><a href="data_buku.php">Data Buku</a></li>
            <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
            <li><a href="data_transaksi.php">Data Transaksi</a></li>
        </ul>
    </nav>
    <h2 style="margin-bottom:20px"><?=$title; ?></h2>
    <form action="<?=$form_action?>" method="post">
        <input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>" />

        <label for="nama_pelanggan">Nama Pelanggan</label>
        <select name="id_pelanggan" id="nama_pelanggan"><?=$nama_pelanggan?>
            <?php foreach ($options_pelanggan as $option) { 
                $selected = $option['id_pelanggan']==$id_pelanggan ? 'selected' : '';
            ?>
            <option value="<?=$option['id_pelanggan']?>" <?= $selected ?>><?=$option['nama_pelanggan']?></option>
            <?php } ?>
        </select><br>

        <label for="nama_buku">Nama Buku</label>
        <select name="id_buku" id="nama_buku"><?=$nama_buku?>
            <?php foreach ($options_buku as $option) {
                $selected = $option['id_buku']==$id_buku ? 'selected' : ''; 
            ?>
            <option value="<?=$option['id_buku']?>" 
                <?= $selected?>><?=$option['nama_buku'] . ' - Rp ' .  $option['harga']?>
            </option>
            <?php } ?> 
        </select><br>

        <label for="kuantitas">Qty</label>
        <input type="text" name="kuantitas" id="kuantitas" value="<?=$kuantitas?>"></input><br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html