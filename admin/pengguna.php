<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='logout.php' </script> <?php } 
include "../koneksi/config.php";
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ShoppingKuy</title>
    <link href="../assets/img/barley.jpeg" rel="shorcut icon">
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!-- Datatables core CSS -->
    <link href="../assets/css/datatables.css" rel="stylesheet">
     <!-- custom CSS here -->
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ShoppingKuy</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Orders</a></li>
                    <li class="active"><a href="">Pengguna</a></li>
                    <li><a href="kategori.php">Kategori</a></li>
                    <li><a href="barang.php">Barang</a></li>
                    <li><a href="chat.php">Chat</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="user.php">Let's Shopping</a></li>
                    <li><a href="logout.php">Logout</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<div class="container">
   <br><br>
   <div class="page-header">
   	<h2> Data Pengguna </h2>
   </div>
   <table id="tables" class="table table-responsive table-bordered table-striped">
   	<thead>
   		<tr>
   			<th style="text-align: center;"> Nama </th>
   			<th style="text-align: center;"> Jenis Kelamin </th>
   			<th style="text-align: center;"> Tanggal Lahir </th>
            <th style="text-align: center;"> Aksi </th>
   		</tr>
   	</thead>
   	<?php
   		$sql = "select * from pengguna where not hak='admin'";
   		$query = mysqli_query($connect, $sql);
   		while ($data = mysqli_fetch_array($query)){ ?>
   			<tr>
   				<td><?php echo ucwords("$data[nama]"); ?></td>
   				<td><?php echo ucwords("$data[jenis_kelamin]"); ?></td>
   				<td><?php echo ucwords("$data[tgl_lahir]"); ?></td>
                <td>
                <center>
                <a href="hapus_pengguna.php?id_pengguna=<?php echo "$data[id_pengguna]"; ?>" onclick='return confirm("Anda Yakin?")' class="btn btn-danger">Hapus</a></center></td>
                </center>    
            </td>
  			</tr>
   		<?php }
   	?>
   </table>
</div>
	<!--Footer -->

    <!--jQUERY FILES-->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!--BOOTSTRAP  FILES-->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- DATATABLES FILES -->
    <script src="../assets/js/datatables.js"></script>
    <script>
    	$(document).ready(function () {
		  $('#tables').DataTable();
		  $('.dataTables_length').addClass('bs-select');
		});
	</script>
</body>
</html>