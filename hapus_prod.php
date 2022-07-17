<?php
include 'db.php';
$produk = mysqli_query($conn, "SELECT gambar FROM produk WHERE id_produk = '".$_GET['idp']."' ");
$p = mysqli_fetch_object($produk);
unlink('./produk/' . $p->gambar);
if (isset($_GET['idp'])) {
	$delete = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '".$_GET['idp']."' ");
	echo '<script>window.location="produk.php"</script>';
}
?>