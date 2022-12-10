<?php 
    include("koneksi.php");

    if($_GET){
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE CategoryID = $id";
    }
    else $sql = "SELECT * FROM products";
    $query = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>
<body>
    <h1>PRODUK</h1>
    <a href="keranjang.php">Keranjang</a>
    <br>
    <br>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
        </thead>
        <?php while($data = mysqli_fetch_array($query)) : 
            $id_produk = $data['ProductID']; ?>
            <tbody>
                <td><?= $id_produk ?></td>
                <td>
                    <a href="info_produk.php?id=<?= $id_produk ?>">
                        <?= $data['ProductName']; ?>
                    </a>
                </td>
                <td><?= $data['UnitPrice']; ?></td>
            </tbody>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="kategori.php">Kembali</a>
</body>
</html>