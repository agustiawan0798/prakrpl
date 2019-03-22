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
</head>

<body>
		
	<?php include ("header.php"); ?>
	<?php
	include ("koneksi.php");
	$q = "SELECT * FROM jurusan WHERE id_jurusan = '". $_GET['id'] ."'";
	$ro = mysqli_fetch_assoc(mysqli_query($connect, $q));
	?>
	<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h2><center>Data Alumni di Jurusan <?= $ro['nama_jurusan'] ?></h2>  
		</div>
    </div>
	
	<!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->
			<!-- building table to put the data -->
			<!-- <a role="button" class="btn btn-primary btmmargin" href="jurusantambah.php"> -->
			<!-- <span class='btn btn-success'><span class="glyphicon glyphicon-plus" aria-hidden="true">  Tambah Jurusan</a></p></span> -->
			<!-- </a> -->

    <div class="row">
  <div class="col-md-4 col-md-offset-4">
    <form action="" method="post">
      <div class="input-group">
        <input type="text" placeholder="Pencarian Data Alumni..." name="kata" class="form-control">
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
						<th><center>NIM</th>
						<th><center>Nama</th>
						<th><center>Alamat</th>
						<th><center>Nomor HP</th>
						<th><center>Tahun Masuk</th>
						<th><center>Tahun Lulus</th>
						<th><center>Jurusan</th>
						 <th><center>Opsi</th> <!-- kata pak teguh dihilangkan saja -->
					</tr>
				</thead>
				
				<tbody>
				<?php
					//put file which is connected to database
					include ("koneksi.php");
					
					$w = "SELECT * FROM jurusan WHERE id_jurusan = '". $_GET['id'] ."'";
						$rq = mysqli_fetch_assoc(mysqli_query($connect, $w));
						$ini=$rq['nama_jurusan'];
					if(isset($_POST['cari'])){
						$k = $_POST['kata'];
						if($k !==""){
							echo "<center>Hasil Pencarian untuk: ", $k ;
						}
	
					  $s = "SELECT * FROM dbalumni WHERE nama_jurusan = '$ini' AND (nim LIKE '%". $k ."%' OR nama LIKE '%". $k ."%' OR alamat LIKE '%". $k ."%' OR nomor_hp LIKE '%". $k ."%' OR tahun_masuk LIKE '%". $k ."%' OR tahun_lulus LIKE '%". $k ."%') ";
					 
					}
					 else {
					  $s = $s = "SELECT * FROM dbalumni  WHERE nama_jurusan='$ini' LIMIT 10";   //////////////
					 }
					//take data from database to be shown
					//$query = "SELECT * from Jurusan";
				$result = mysqli_query($connect, $s) or die(mysqli_error($connect));
	while ($row = mysqli_fetch_array($result)) {
	?>
					<tr>
						<!-- put data which we want to show via table -->
						<td align="center"><?php echo $row['nim'] ?></td>
						<td align="center"><?php echo $row['nama'] ?></td>
						<td align="center"><?php echo $row['alamat'] ?></td>
						<td align="center"><?php echo $row['nomor_hp'] ?></td>
						<td align="center"><?php echo $row['tahun_masuk'] ?></td>
						<td align="center"><?php echo $row['tahun_lulus'] ?></td>
						<td align="center"><?php echo $row['nama_jurusan'] ?></td>
						<td align="center">
							<!-- icon that will lead us to delete or edit data -->
							<a href = 'alumniubah.php?nim=<?php echo $row['nim']; ?>'
class='btn btn-success'><span class='glyphicon glyphicon-edit'></span> Ubah</button?></a>
<a href="alumnihapus.php?nim=<?php echo $row['nim']; ?>"onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"/><button type="button" class = "btn btn-danger btn-sm" ?>
<span class = 'glyphicon glyphicon-remove-sign'></span> Hapus</button></a></td> <!-- kata pak teguh dihilangkan saja -->
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