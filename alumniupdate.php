<?php
session_start();
if(!($_SESSION['username'])){
	header("Location: index.php");
}
?>

<?php
	include "koneksi.php";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	
	$nim = test_input($_POST['nim']);
	$nim_awal = test_input($_POST['nim_awal']);
	$nama = test_input($_POST['nama']);
	$tahun_masuk = test_input($_POST['tahun_masuk']);
	$tahun_lulus = test_input($_POST['tahun_lulus']);
	$nomor_hp =test_input($_POST['nomor_hp']);
	$alamat = test_input($_POST['alamat']);
	$id_jurusan = test_input($_POST['id_jurusan']);
	
	$q = "update alumni set nim='$nim', nama='$nama', tahun_masuk='$tahun_masuk', tahun_lulus='$tahun_lulus', nomor_hp='$nomor_hp', alamat='$alamat', id_jurusan='$id_jurusan' where nim = '$nim_awal'";

	$query = mysqli_query($connect, $q) or die(mysqli_error($connect));
									
	if ($query){
		header('location:alumni2.php?message=success');
	}else{
		echo "<script>alert('NIM yang Anda masukkan sudah terdaftar');history.go(-1);</script>";
	}
?>