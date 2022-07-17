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
			<h3>Tambah Data Produk</h3>
			<div class="box">
			<form action="" method="POST" enctype="multipart/form-data">
				<select class="input_data" name="kategori" required>
					<option value="">Pilih Kategori</option>
					<?php
					$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori ");
					while($r = mysqli_fetch_array($kategori)){
					?>
					<option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['nama_kategori'] ?></option>
				<?php } ?>

				</select>
				<input type="text" name="nama" placeholder="Nama Produk" class="input_data" required>
				<input type="text" name="harga" placeholder="Harga" class="input_data" required>
				<input type="file" name="gambar" class="input_data" required>
				<textarea type="text" name="deskripsi" placeholder="Deskripsi Produk" class="input_data" required></textarea> 
				<input type="submit" name="submit" value="Tambah Produk" class="tombol_login">
			</form>		
			<?php
			if (isset($_POST['submit'])) {
				$kategori = $_POST['kategori'];
				$nama = $_POST['nama'];
				$harga = $_POST['harga'];
				$deskripsi = $_POST['deskripsi'];
				$filename = $_FILES['gambar']['name'];
				$tmp_name = $_FILES['gambar']['tmp_name'];

				$type1 = explode('.', $filename);
				$type2 = $type1[1];

				$ekstensi_gambar = array('jpg', 'jpeg', 'png', 'PNG');
				if (!in_array($type2, $ekstensi_gambar)) {

					echo '<script>alert("Format tidak sesuai")</script>';
					}else{
						move_uploaded_file($tmp_name, './produk/'.$filename);
						$insert = mysqli_query($conn, "INSERT INTO produk VALUES (null, '".$kategori."', '".$nama."', '".$harga."', '".$deskripsi."', '".$filename."', null )");
						if ($insert) {
							echo '<script>alert("Tambah produk Berhasil")</script>';
							echo '<script>window.location="produk.php"</script>';
						}else{
							echo 'gagal' .mysqli_error($conn);
						}
					
				}

			}
			?>		
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