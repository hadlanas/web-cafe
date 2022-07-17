<?php 
session_start();
$id_produk = $_GET['id'];
if (isset($_SESSION['cart'][$id_produk])) {
	$_SESSION['cart'][$id_produk]+=1;
}else{
	$_SESSION['cart'][$id_produk]=1;
}
 
echo '<script>alert("pesan Produk Berhasil")</script>';
echo '<script>window.location="keranjang.php"</script>';


 ?>