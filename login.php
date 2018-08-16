<!DOCTYPE html>
<html>
<head>
	<title>Login Aplikasi Pembayaran SPP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div  class="col-sm-12 col-md-push-4 col-md-4">
<h3>Silahkan Login Menggunakan Username dan Password Anda</h3>
<form method="post" action="">
	<div class="form-group">
		<label>Username</label> 
		<input type="text" name="username" class="form-control" autofocus=""/>
	</div>
	<div class="form-group">
		<label>Password</label> 
		<input type="password" name="password" class="form-control" />
	</div>
	<div class="form-group">
		<input type="submit" value="Login" class="btn btn-primary" />
	</div>
</form>
</div>
</div>	
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel untuk menyimpan kiriman dari form
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if($user=='' || $pass==''){
		echo "Form belum lengkap!!";
	}else{
		include "config/koneksi.php";
		$sqlLogin = mysqli_query($konek, "SELECT * FROM admin 
						WHERE username='$user' AND password='$pass'");
		$jml = mysqli_num_rows($sqlLogin);
		$d=mysqli_fetch_array($sqlLogin);
		if($jml > 0){
			session_start();
			$_SESSION['login']	= true;
			$_SESSION['id']		= $d['idadmin'];
			$_SESSION['jk']		= $d['jk'];
			
			header('location:./index.php');
		}else{
			echo "Username dan Password anda Salah!!!";
		}
	}
}
?>
<script src="bootstrap/js/jqurey.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>