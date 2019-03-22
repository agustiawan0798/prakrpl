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

    <title>Tabel Alumni</title>

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
        <h2 class="title"><center>Tambah Data Alumni</h2></br>
        <form class="form-horizontal" action="alumniinsert.php" method="post">

            <div class="form-group">
            <label class="col-sm-3 control-label"> NIM</label>
            <div class="col-sm-6">
            <input type="text" name='nim' class="form-control" required>
        </div>
    </div>

           <div class="form-group">
<label class="col-sm-3 control-label">Nama</label>
<div class="col-sm-6">
<input type="text" class="form-control" name='nama' required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Alamat</label>
<div class="col-sm-6">
<input type="text" name='alamat' class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Nomor HP</label>
<div class="col-sm-6">
<input type="text" class="form-control" name='nomor_hp' required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Tahun Masuk</label>
<div class="col-sm-6">
<input type="text" class="form-control" name='tahun_masuk' required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Tahun Lulus</label>
<div class="col-sm-6">
<input type="text" class="form-control" name='tahun_lulus' required>
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">Jurusan</label>
<div class="col-sm-6">
<select class="form-control" name='id_jurusan'>
<?php include "koneksi.php";
$query = "SELECT * FROM jurusan";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
while ($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['id_jurusan']; ?>"><?php echo $row['nama_jurusan']; ?></option>
<?php } ?>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Admin</label>
<div class="col-sm-6">
<select class="form-control" name='id_admin'>
<?php include "koneksi.php";
$query = "SELECT * FROM admin";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
while ($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['id_admin']; ?>"><?php echo $row['username']; ?></option>
<?php } ?>
</select>
</div>
</div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-success" value="Tambah Data">Tambah Data</button>
                </div>
            </div>
            

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

