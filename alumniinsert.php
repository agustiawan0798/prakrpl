<?php 
	session_start();

	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	header("location:index.php");
	}
else {
include "koneksi.php";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$nim = test_input($_POST['nim']);
$nama = test_input($_POST['nama']);
$alamat = test_input($_POST['alamat']);
$nomor_hp = test_input($_POST['nomor_hp']);
$tahun_masuk = test_input($_POST['tahun_masuk']);
$tahun_lulus = test_input($_POST['tahun_lulus']);
$id_jurusan = test_input($_POST['id_jurusan']);
$id_admin = test_input($_POST['id_admin']);

//insert secara prosedural
$query = mysqli_query($connect, "insert into alumni (nim, nama, alamat, nomor_hp, tahun_masuk, tahun_lulus, id_jurusan, id_admin) values ('$nim','$nama', '$alamat', '$nomor_hp', '$tahun_masuk', '$tahun_lulus', '$id_jurusan', '$id_admin')");
if ($query) {
header('location:alumni2.php');
} 

else {
  echo "<script>alert('NIM yang Anda masukkan sudah terdaftar');history.go(-1);</script>";
}

}