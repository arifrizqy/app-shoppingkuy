<?php session_start();

 
include "koneksi/config.php";
 ?>

<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Login </title>
	<link href="assets/img/keranjang.png" rel="shorcut icon">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style>
    	.flat{
    		border-radius: 0px;
    	}
	</style>
</head>
<body style="background: #bae8e8;">
<div class="container">
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
		<h2 class="page-header">Login</h2>
			<form method="POST">
				<div class="form-group">
					<label>Username</label><br>
					<input type="text" class="form-control flat" name="user" placeholder="Username" maxlength="30" required/><br>
					<label>Password</label><br>
					<input type="password" class="form-control flat" name="pass" placeholder="Password" maxlength="20" required/>
					<br>
					<button class="btn btn-warning flat" type="submit" name="login">Login</button> Atau <a href="daftar.php" class="btn btn-default flat">Daftar</a>
				</div>	
			</form>
			<?php
			if(isset($_POST['login'])){
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$sql = "select * from pengguna where username='$user' and password='$pass'";
				$query = mysqli_query($connect, $sql);
				$data = mysqli_fetch_array($query);
				$cek = mysqli_num_rows($query);
				$nama = $data['nama'];
				$hak = $data['hak'];
				$id = $data['id_pengguna'];
				if($cek > 0){ 
					if($hak == "pengguna"){ 
							$_SESSION['nama'] = $nama;
							$_SESSION['hak'] = $hak;
							$_SESSION['id'] = $id;
						?>
						<script> window.location.href='pengguna/home.php' </script>
				<?php }else if($hak == "admin"){ 
							$_SESSION['nama'] = $nama;
							$_SESSION['hak'] = $hak;
							$_SESSION['id'] = $id;
						?>
						<script> window.location.href='admin/home.php' </script>
				<?php }
				}else{ ?>
					<div class="alert alert-danger"> Login Gagal </div>
				<?php } 
			} ?>
		</div>
		<div class="col-sm-4">
		</div>		
	</div>	
</div>
</body>
</html>