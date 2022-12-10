<?php 
    include("koneksi.php");

    $id = $_GET['id'];
    $sql = "SELECT * FROM products JOIN suppliers on products.SupplierID = suppliers.SupplierID 
            WHERE products.ProductID = $id";
    $query = $connect->query($sql);

    $sql2 = "SELECT * FROM products WHERE ProductID = $id";
    $query2 = $connect->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Produk</title>
</head>
<body>
    <h1>Info Produk
        <u>
            <?php while($data = mysqli_fetch_array($query2)) {
                echo $data['ProductName'];
            } ?>
        </u>
    </h1>
    <a href="keranjang.php">Keranjang</a>
    <br>
    <br>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kuantitas<br>per Unit</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Unit<br>dalam Pesanan</th>
            <th>Reorder<br>Level</th>
            <th>Tidak<br>Dilanjutkan</th>
            <th>Supplier</th>
        </thead>
        <?php while($data = mysqli_fetch_array($query)) : 
            $id = $data['ProductID']; 
            $nama = $data['ProductName']; 
            $harga = $data['UnitPrice'];
            $kategori = $data['CategoryID'];
        ?>
            <tbody>
                <td><?= $id ?></td>
                <td>
                    <a href="produk.php?id=<?= $id ?>">
                        <?= $nama; ?>
                    </a>
                </td>
                <td><?= $data['QuantityPerUnit']; ?></td>
                <td><?= $harga; ?></td>
                <td><?= $data['UnitsInStock']; ?></td>
                <td><?= $data['UnitsOnOrder']; ?></td>
                <td><?= $data['ReorderLevel']; ?></td>
                <td><?= $data['Discontinued']; ?></td>
                <td><?= $data['CompanyName']; ?></td>
            </tbody>
        <?php endwhile; ?>
    </table>
    <br>
    <form action="tambah_keranjang.php" method="POST">
        <label for="jumlah">Jumlah Barang :</label>
        <input type="text" name="jumlah">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="nama" value="<?= $nama ?>">
        <input type="hidden" name="harga" value="<?= $harga ?>">
        <button>Tambah ke Keranjang</button>
    </form>
    <hr>
    <br>
    <a href="produk.php?id=<?= $kategori; ?>">Kembali</a>
</body>
</html>