<?php 
session_start();
include 'db.php';


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device, initial-scale=1">
	<title>cafe mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="bd_dashboard">
	<header>
		<div class="container">
		<h1><a href="index.php">pesan lagi ?</a></h1>
		<ul>
			<li><a href="index.php">menu</a></li>
			<li><a href="Keranjang.php">Pesanan</a></li>
		</ul>
		</div>
	</header>
	<div class="section">
		<div class="container">
			<h3>Pesanan Anda</h3>
			<div class="box">
			<table border="1" cellspacing="0" class="tablep">
				<thead>
					<tr>
						<th width="10px">No</th>
						<th>Nama Produk</th>
						<th>Harga Produk</th>
						<th>Jumlah</th>
						<th>total harga</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($_SESSION["cart"] as $id_produk => $jumlah) {
					?>
					<?php 
					$ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$total = $pecah["harga_produk"]*$jumlah;


					 ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $pecah["nama_produk"]; ?></td>
						<td>Rp.<?php echo number_format($pecah["harga_produk"]); ?></td>
						<td><?php echo $jumlah ?></td>
						<td>Rp.<?php echo number_format($total); ?></td>

					</tr>
					<?php } ?>
				</tbody>
			</table>
						
			</div>
		</div>
	</div>
</body>
</html>