<?php
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '".$_SESSION['id']."'");
	$d = mysqli_fetch_object($query);
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
			<h3>Profil</h3>
			<div class="box">
			<form action="" method="POST">
				<input type="text" name="nama" placeholder="Nama Lengkap" class="input_data" value="<?php echo $d->nama_admin ?>" required>
				<input type="text" name="user" placeholder="username" class="input_data" value="<?php echo $d->username ?>" required>
				<input type="text" name="hp" placeholder="No HP" class="input_data" value="<?php echo $d->no_telp ?>" required>
				<input type="text" name="email" placeholder="Email" class="input_data" value="<?php echo $d->email ?>" required>
				<input type="text" name="alamat" placeholder="Alamat" class="input_data" value="<?php echo $d->alamat ?>" required>
				<input type="submit" name="submit" value="Ubah profil" class="tombol_login">
			</form>
			<?php
			if (isset($_POST['submit'])) {
				$nama = $_POST['nama'];
				$user = $_POST['user'];
				$hp = $_POST['hp'];
				$email = $_POST['email'];
				$alamat = $_POST['alamat'];

				$update = mysqli_query($conn, "UPDATE admin SET nama_admin = '".$nama."', username = '".$user."',no_telp = '".$hp."',email = '".$email."',alamat = '".$alamat."' WHERE id_admin = '".$d->id_admin."'");
				if ($update) {
					echo '<script>alert("Ubah data berhasil")</script>';
					echo '<script>window.location="profil.php"</script>';
				}
				else{
					echo 'gagal'.mysqli_error($conn);
				}
			}
			?>				
			</div>
			<h3>Ganti Password</h3>
			<div class="box">
			<form action="" method="POST">
				<input type="password" name="p1" placeholder="password baru" class="input_data"  required>
				<input type="password" name="p2" placeholder="Konfirmasi Password" class="input_data" required>
				<input type="submit" name="ubah_pass" value="Ubah Password" class="tombol_login">
			</form>
			<?php
			if (isset($_POST['ubah_pass'])) {
				$pass1 = $_POST['p1'];
				$pass2 = $_POST['p2'];

				if ($pass2 != $pass1) {
					echo '<script>alert("Ubah Password gagal")</script>';
				}else{
				$u_pass = mysqli_query($conn, "UPDATE admin SET password = '".MD5($pass1)."'WHERE id_admin = '".$d->id_admin."'");
				if ($u_pass) {
					echo '<script>alert("Ubah data berhasil")</script>';
					echo '<script>window.location="profil.php"</script>';
				}
				else{
					echo 'gagal'.mysqli_error($conn);
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