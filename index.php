<?php 
include 'db.php' ?>
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
		<h1><a href="index.php">cafe mahasiswa</a></h1>
		<ul>
			<li><a href="index.php">menu</a></li>
			<li><a href="keranjang.php">pesanan</a></li>
			<li><a href="login.php">login</a></li>
		</div>
	</header>
	<div class="section">
		<div class="container">
			<h3>Kategori</h3>
			<div class="box">
				<?php
				$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori ");
				if (mysqli_num_rows($kategori) > 0) {
					while($k = mysqli_fetch_array($kategori)){
				
				?>
					<div class="col-3">
						<img src="gambar/Kategori.png" width="50px" style="margin-bottom: 5px">
						<p><?php echo $k['nama_kategori'] ?></p>
					</div>
				<?php } }else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<h3>Menu</h3>
			<div class="box">
				<?php 
				$produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk");
				if (mysqli_num_rows($produk)) {
					while ($p = mysqli_fetch_array($produk)) {
				
				 ?>
				<div class="col-5">
					<img src="produk/<?php echo $p['gambar'] ?>">
					<p class="nama"><?php echo $p['nama_produk'] ?></p>
					<p class="harga">Rp. <?php echo $p['harga_produk'] ?></p><br>
					<center><a href="proses-beli.php?id=<?php echo $p['id_produk'] ?>" class="pesan">Pilih</a></center>
				</div></a>
			<?php }}else{ ?>
					<p>Produk Kosong</p>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>