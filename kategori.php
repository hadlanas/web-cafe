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
	<div class="section">
		<div class="container">
			<h3>Kategori</h3>
			<div class="box">
			<table border="1" cellspacing="0" class="table">
				<thead>
					<tr>
						<th width="10px">No</th>
						<th>Kategori</th>
						<th width="50px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$k = mysqli_query($conn, "SELECT * FROM kategori  ORDER BY id_kategori");
					while($row = mysqli_fetch_array($k)){
					?>
					<tr>
						<td><?php echo $no++?></td>
						<td><?php echo $row['nama_kategori']?></td>
						<td><a href="edit_k.php?id=<?php echo $row['id_kategori'] ?>">Edit</a>|<a href="hapus_k.php?idk=<?php echo $row['id_kategori'] ?>">Hapus</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<p><a href="tambahdata.php">Tambah Data</a></p>			
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