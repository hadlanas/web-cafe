<?php
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device, initial-scale=1">
	<title>Sistem Informasi</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="bd_dashboard">
	<header>
		<div class="container">
		<h1><a href="dashboard.php">Sistem Informasi Cafe Mahasiswa</a></h1>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="profil.php">Profil</a></li>
			<li><a href="kategori.php">Kategori</a></li>
			<li><a href="produk.php">Data Produk</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		</div>
	</header>
	<div class="search">
		<div class="container">
			<form method="get" action="">
				<input type="text" name="search" placeholder="Cari produk">
				<input type="submit" value="Cari ">
			</form>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">
			<table border="1" cellspacing="0" class="tablep">
				<thead>
					<tr>
						<th width="10px">No</th>
						<th>Kategori</th>
						<th>Nama Produk</th>
						<th>Harga Produk</th>
						<th>Gambar Produk</th>
						<th width="150px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($_GET['cari'])) {
   
						$cari = $_GET['cari'];
						$produk= "SELECT * FROM produk WHERE nama_produk like '%".$cari."%'";

					}

					$no = 1;
					$produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (id_kategori)ORDER BY id_produk");
					while($row = mysqli_fetch_array($produk)){
					?>
					<tr>
						<td><?php echo $no++?></td>
						<td><?php echo $row['nama_kategori']?></td>
						<td><?php echo $row['nama_produk']?></td>
						<td>Rp.<?php echo number_format($row['harga_produk'])?></td>
						<td><img src="produk/<?php echo $row['gambar']?>" width="100px" style="display: block; margin: auto;"></td>
						<td><a href="edit_prod.php?id=<?php echo $row['id_produk'] ?>">Edit</a>|<a href="hapus_prod.php?idp=<?php echo $row['id_produk'] ?>">Hapus</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<p><a href="tambah_produk.php">Tambah Produk</a></p>			
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<small>Copyright &copy; Hafiz Adlan Afrigi Subri / H1051181084.</small>
		</div>
	</footer>

</body>
</html>