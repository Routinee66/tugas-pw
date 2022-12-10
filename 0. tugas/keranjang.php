<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
</head>
<body>
    <h1>KERANJANG BELANJA</h1>
    <br>
    <table border="1">
        <thead>
            <th>No.</th>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
        </thead>
        <?php $no = 1; $total_biaya = 0;
        foreach($_SESSION['keranjang'] as $keranjang){ 
            $biaya = $keranjang["biaya"];
            $total_biaya += $biaya;
        ?>
            <tbody>
                <td> <?= $no; $no += 1 ?> </td>
                <td> <?= $keranjang["id"]; ?> </td>
                <td> <?= $keranjang["nama"]; ?> </td>
                <td> <?= $keranjang["jumlah"]; ?> </td>
                <td> <?= $keranjang["harga"]; ?> </td>
                <td><b><?= $biaya; ?></b></td>
            </tbody>
        <?php } ?>
        <tbody>
            <td colspan="4"><center>TOTAL BIAYA</center></td>
            <td colspan="2"><center><?= $total_biaya; ?></center></td>
        </tbody>
    </table>
    <br>
    <a href="kategori.php">Kembali</a>
</body>
</html>



