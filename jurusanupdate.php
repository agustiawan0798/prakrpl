<?php 
	session_start();

	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	header("location:index.php");
	}
?>

<?php
	//put file which is connected to database
	include "koneksi.php";

	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

	//take all parameters through post method
	// $id_jurusan = $_GET['id_jurusan'];
	$id_jurusan = test_input($_POST['id_jurusan']);
	$nama_jurusan = test_input($_POST['nama_jurusan']);
	$akreditasi = test_input($_POST['akreditasi']);
	$no_telp = test_input($_POST['no_telp']);

	//update data in database based on nim
	$query = mysqli_query($connect, "update jurusan set id_jurusan='$id_jurusan', nama_jurusan='$nama_jurusan', akreditasi='$akreditasi', no_telp='$no_telp' where id_jurusan='$id_jurusan'") or die(mysql_error($connect));
	// $query = mysqli_query($connect, "update jurusan set nama_jurusan='$nama_jurusan', akreditasi='$akreditasi', no_telp='$no_telp' where id_jurusan='$id_jurusan'") or die(mysql_error($connect));

	if ($query) {
		header('location:jurusan.php?message=success');
	}
?>
