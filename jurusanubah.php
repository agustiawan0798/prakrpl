<?php 
	session_start();

	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Update Data Jurusan</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
	<link href="assets/css/footer.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<?php
	//put file which is connected to database
	// include "koneksi.php";
	
	// //take all parameters through get method
	// $id_jurusan = $_GET['id_jurusan']; //id=nim
	
	// //doing read process from database
	// $query = mysqli_query($connect, "select * from Jurusan where id_jurusan='$id_jurusan'") or die(mysql_error($connect));
	// $data = mysqli_fetch_array($connect, $query);
?>

<?php
	// isikan dengan query select data
		include "koneksi.php";
		$id_jurusan = $_GET['id_jurusan'];
		$query = "SELECT * FROM Jurusan where id_jurusan = '$id_jurusan'";
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		$data = mysqli_fetch_array($result);
	?>

</head>

<body>
		
	<?php include ("header.php"); ?>

	<div class="container">
		<h2 class="title"><center>Ubah Data Jurusan</h2>
		<form class="form-horizontal" action="jurusanupdate.php" method="post" role="form">
			
			<div class="form-group">
				<label class="col-sm-3 control-label">Id Jurusan</label>
				<div class="col-sm-6">
					<input class="form-control" name="id_jurusan" type="text" value="<?php echo $data['id_jurusan'] ; ?> " readonly>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Jurusan</label>
				<div class="col-sm-6">
					<input class="form-control" name="nama_jurusan" type="text" value="<?php echo $data['nama_jurusan'];?>"required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label">Akreditasi</label>
				<div class="col-sm-6">
					<input class="form-control" name="akreditasi" type="text" value="<?php echo $data['akreditasi'];?>"required>
				</div>	
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Nomor Telepon</label>
				<div class="col-sm-6">
					<input class="form-control" name="no_telp" type="text" value="<?php echo $data['no_telp'];?>" required>
				</div>	
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
				<a href="jurusan.php>"onClick="return confirm('Apakah Anda yakin ingin mengubah data jurusan ini?')"/><button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button></a>
				</div>
			</div>

			</br></br></br></br>
		</form>

	</div>
	<?php include ("footer.php"); ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>