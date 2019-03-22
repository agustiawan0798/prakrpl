<?php
session_start();
if(!($_SESSION['username'])){
	header("Location: index.php");
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

    <title>Tabel Alumni</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">

    <script src="assets/js/ie-emulation-modes-warning.js"></script>
<?php
    include "koneksi.php";
    $nim = $_GET['nim'];
    $query = "SELECT * FROM alumni where nim = '$nim'";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    $row = mysqli_fetch_array($result);
    
?>
</head>

<body>
		
	<?php include ("header.php"); ?>

<div class="container">
        <h2 class="title"><center>Ubah Data Alumni</h2></br>
        <form class="form-horizontal" action="alumniupdate.php" method="post" role="form">

    <div class="form-group">
        <label class="col-sm-3 control-label">NIM</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" name='nim' value="<?php echo $row['nim']; ?>" required ></textarea>
            </div>
    </div>
<div class="form-group">
<label class="col-sm-3 control-label">Nama</label>
<div class="col-sm-6">
<input type="text" class="form-control" name='nama' value="<?php echo $row['nama']; ?>" required></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Alamat</label>
<div class="col-sm-6">
<input type="text" name='alamat' class="form-control" value="<?php echo $row['alamat']; ?>"required></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Nomor HP</label>
<div class="col-sm-6">
<input type="text" name='nomor_hp' class="form-control" value="<?php echo $row['nomor_hp']; ?>"required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Tahun Masuk</label>
<div class="col-sm-6">
<input type="text" name='tahun_masuk' class="form-control" value="<?php echo $row['tahun_masuk']; ?>"required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Tahun Lulus</label>
<div class="col-sm-6">
<input type="text" name='tahun_lulus' class="form-control" value="<?php echo $row['tahun_lulus']; ?>"required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Jurusan</label>
<div class="col-sm-6">
<select class="form-control" name='id_jurusan'>
<?php include "koneksi.php";
$query = "SELECT * FROM jurusan";
$queryjurusan = "SELECT id_jurusan FROM alumni where nim = $nim";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
$resultjurusan = mysqli_query($connect, $queryjurusan) or die(mysqli_error($connect));
$rowjurusan = mysqli_fetch_array($resultjurusan);
while ($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['id_jurusan']; ?>" <?php if($row['id_jurusan'] == $rowjurusan['id_jurusan']) echo 'selected = "selected"'; ?> ><?php echo $row['nama_jurusan']; ?></option>
<?php } ?>
</select>
</div>
</div>
<input type="hidden" name="nim_awal" value="<?= $_GET['nim'] ?>">
<div class="form-group">
<div class="col-sm-offset-3 col-sm-4">
<!-- <a href="alumni2.php>"onClick="myFunction()"><button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button></a> -->

<a href="alumni2.php>"onClick="return confirm('Apakah Anda yakin ingin mengubah data ini?')"><button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button></a>


<!-- <div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
				<a href="alumni2.php>"onClick="return confirm('Apakah Anda yakin ingin mengubah data Alumni?')"/><button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button></a>
				</div>
			</div> -->


</div>
</div>
</form>
</div>
</div>
</div>
<?php include ("footer.php"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>