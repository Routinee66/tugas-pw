<?php 

$id     = $_POST["id"];
$nama   = $_POST["nama"];
$jumlah = $_POST["jumlah"];
$harga  = $_POST["harga"];
$biaya  = $jumlah * $harga;

$keranjang = [
    "id" => $id,
    "nama" => $nama,
    "jumlah" => $jumlah,
    "harga" => $harga,
    "biaya" => $biaya
];

session_start();

if(!($_SESSION)){
    $_SESSION['keranjang'] = array();
}
array_push($_SESSION['keranjang'], $keranjang);

header("location: keranjang.php");

?>