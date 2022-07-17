<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device, initial-scale=1">
	<title>login Sistem Informasi Cafe Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="bg_body">
	<div class="box_login">
		<h2>Silahkan Login</h2>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input_data">
			<input type="password" name="pass" placeholder="Password" class="input_data">
			<center><input type="submit" name="submit" value="Login" class="tombol_login"></center>
		</form>
		<?php 
		if(isset($_POST['submit'])){
			session_start();
			include 'db.php';
			$user = $_POST['user'];
			$pass = $_POST['pass'];

			$cek = mysqli_query($conn, "SELECT * FROM admin where username = '".$user."' AND password = '" .MD5($pass)."'");
			if(mysqli_num_rows($cek) > 0){
				$d = mysqli_fetch_object($cek);
				$_SESSION['status_login'] = true;
				$_SESSION['a_global'] = $d;
				$_SESSION['id'] = $d->id_admin;
				echo '<script>window.location="dashboard.php"</script>';
			}
			else{
				echo '<script>alert("Username atau Password Salah!!!")</script>';
			}
			
		}
		?>
	</div>

</body>
</html>