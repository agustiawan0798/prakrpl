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

    <title>Tabel Jurusan</title>

    <!-- Bootstrap core CSS -->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">

		<link href="assets/css/footer.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
		
	<?php include ("header.php"); ?>
	
	<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h2><center>Data Jurusan di FT UNDIP</h2>  
		</div>
    </div>
	
	<div class="row">
        <div class="col-md-12">
			<!-- building table to put the data -->
			<a href = 'jurusantambah.php?'
			class='btn btn-success'>
			<span class='glyphicon glyphicon-plus'></span> Tambah Data Jurusan</a>

    <div class="row">
  <div class="col-md-4 col-md-offset-4">
    <form action="" method="post">
      <div class="input-group">
        <input type="text" placeholder="Pencarian Data Jurusan..." name="kata" class="form-control">
        <div class="input-group-btn">
          <input type="submit" name="cari" class="btn btn-success" value="CARI">
        </div>
      </div>
    </form>
  </div>
</div><br>
			
			<table class="table table-striped table-bordered table-hover" id_jurusan="dataTables-example">
				<thead>                                   
					<tr>
						<th><center>Id Jurusan</th>
						<th><center>Nama Jurusan</th>
						<th><center>Akreditasi</th>
						<th><center>Nomor Telepon</th>
						<th><center>Opsi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
					//put file which is connected to database
					include ("koneksi.php");
					

					if(isset($_POST['cari'])){
  $k = $_POST['kata'];
  $s = "SELECT * FROM jurusan WHERE id_jurusan LIKE '%". $k ."%' OR nama_jurusan LIKE '%". $k ."%' OR akreditasi LIKE '%". $k ."%' OR no_telp LIKE '%". $k ."%' ";
 }
 else {
  $s = $s = "SELECT * FROM jurusan";
 }
					//take data from database to be shown
					//$query = "SELECT * from Jurusan";
				$result = mysqli_query($connect, $s) or die(mysqli_error($connect));
	while ($row = mysqli_fetch_array($result)) {
	?>
					<tr>
						<!-- put data which we want to show via table -->
						<td align="center"><?php echo $row['id_jurusan'] ?></td>
						<td align="center"><?php echo $row['nama_jurusan'] ?></td>
						<td align="center"><?php echo $row['akreditasi'] ?></td>
						<td align="center"><?php echo $row['no_telp'] ?></td>
						<td align="center">
							<!-- icon that will lead us to delete or edit data -->
							<a href = 'jurusanubah.php?id_jurusan=<?php echo $row['id_jurusan']; ?>'
class='btn btn-success'><span class='glyphicon glyphicon-edit'></span>Ubah</button?></a>
<a href='jurusandetail.php?id=<?php echo $row['id_jurusan']; ?>' class = 'btn btn-primary'>
<span class = 'glyphicon glyphicon-user'></span>Lihat Alumni</button></a>
<a href="jurusanhapus.php?id_jurusan=<?php echo $row['id_jurusan']?>"onClick="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?')"/><button type="button" class = "btn btn-danger btn-sm" ?>
<span class = 'glyphicon glyphicon-remove-sign'> </span> Hapus</button></a></td>
</tr>
				<?php
					}
				?>
				</tbody>
				
				
			</table>
			<div style="float: right;">
			</div>
        </div>
		</div>
	</div>
	</br></br>
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