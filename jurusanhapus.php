<?php 
	session_start();

	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	header("location:index.php");
	}else{
	//put file which is connected to database
	include "koneksi.php";

	//take all parameters through get method
	$id_jurusan = $_GET['id_jurusan'];

	//delete data from database based on nim
	$query = mysqli_query($connect, "delete from jurusan where id_jurusan='$id_jurusan'") or die(mysqli_error($connect));

	if ($query) {
		header('location:jurusan.php?message=delete');
	}}
?>