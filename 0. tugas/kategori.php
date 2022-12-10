<?php 
    include("koneksi.php");

    $sql = "SELECT * FROM categories";
    $query = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
</head>
<body>
    <h1>KATEGORI</h1>
    <a href="keranjang.php">Keranjang</a>
    <br>
    <br>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Kategori</th>
            <th>Keterangan</th>
        </thead>
        <?php while($data = mysqli_fetch_array($query)) : 
            $id = $data['CategoryID']; ?>
            <tbody>
                <td><?= $id ?></td>
                <td>
                    <a href="produk.php?id=<?= $id ?>">
                        <?= $data['CategoryName']; ?>
                    </a>
                </td>
                <td><?= $data['Description']; ?></td>
            </tbody>
        <?php endwhile; ?>
    </table>
</body>
</html>