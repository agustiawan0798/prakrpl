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

    <title>Alumni</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

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
			<h2><center>Data Alumni</h2>  
		</div>
    </div>
	
	<div class="row">
        <div class="col-md-12">
			<!-- building table to put the data -->

			<a href = 'alumnitambah.php?'class='btn btn-success'><span class='glyphicon glyphicon-plus'></span> Tambah Data Alumni</button?></a>
			<!-- <a href = 'jurusantambah.php?'
			class='btn btn-success'>
			<span class='glyphicon glyphicon-plus'></span> Tambah Data Jurusan</a> -->

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
  </div><br><br>

			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>                                   
					<tr><br>
						<th><center>NIM</th>
						<th><center>Nama</th>
						<th><center>Alamat</th>
						<th><center>Nomor HP</th>
						<th><center>Tahun Masuk</th>
						<th><center>Tahun Lulus</th>
						<th><center>Jurusan</th>
						<th><center>Opsi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
					//put file which is connected to database
					include ("koneksi.php");

if(isset($_POST['cari'])){
	$k = $_POST['kata'];
	if($k !==""){
		echo "<center>Hasil Pencarian untuk: ", $k;
		
	}
	
	
  $s = "SELECT * FROM dbalumni WHERE nim LIKE '%". $k ."%' OR nama LIKE '%". $k ."%' OR alamat LIKE '%". $k ."%' OR nomor_hp LIKE '%". $k ."%' OR tahun_masuk LIKE '%". $k ."%' OR tahun_lulus LIKE '%". $k ."%' OR nama_jurusan LIKE '%". $k ."%' ";
 
}
 else {
  $s = "SELECT * FROM dbalumni ";   //////////////
 }

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
<button type ="button" class="btn btn-success btn-sm"><span class='glyphicon glyphicon-edit'></span> Ubah</button?></a>
<a href="alumnihapus.php?nim=<?php echo $row['nim']?>"onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"/><button type="button" class = "btn btn-danger btn-sm" ?>
<span class = 'glyphicon glyphicon-remove-sign'> </span> Hapus</button></a></td>
<!-- 'class = 'btn btn-danger'> -->

</tr>
				<?php
			
					}
				?>
				</tbody>
				

				
			</table>
			<div style="float: left;">
			</div>

			
        </div>
	</div>
		
	</div></br></br>
	<?php include ("footer.php"); ?>

</body>

</html>