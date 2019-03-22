<?php 
	session_start();

	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	header("location:index.php");
	}else{

	//put file which is connected to database
	include "koneksi.php";

	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	//take all parameters through get method
	$nim = test_input($_GET['nim']);
	//delete data from database based on nim
	$query = mysqli_query($connect, "delete from alumni where nim='$nim'") or die(mysqli_error($connect));

	if ($query) {
		
		header('location:alumni2.php?message=deletesuccess');
	}}
?>