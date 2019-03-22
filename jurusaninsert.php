<?php 
	session_start();

	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	header("location:index.php");
	}else{

	//put file which is connected to database
	include "koneksi.php";

						
	//take all parameters through post method
	$id_jurusan = $_POST['id_jurusan'];
	$nama_jurusan = $_POST['nama_jurusan'];
	$akreditasi = $_POST['akreditasi'];
	$no_telp = $_POST['no_telp'];

	//insert data into database
	$query = mysqli_query($connect, "insert into jurusan values ('$id_jurusan', '$nama_jurusan', '$akreditasi', '$no_telp')") or die(mysqli_error($connect));

	if ($query) {
		header('location:jurusan.php?message=success');
	}
	else{
		echo "<script>alert('Silakan cek ulang data yang Anda masukkan');history.go(-1);</script>";
	}
}
?>