<?php
 
  session_start();
 include "koneksi.php";

 $username = addslashes(trim($_POST['username']));
 $password =md5( $_POST['password']); 
 
 $QUERY = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
 
 $hasil = mysqli_query($connect, $QUERY) or die(mysqli_error($connect));
 $row = mysqli_fetch_array($hasil);
 if ($row['username'] == $username AND $row['password'] == $password) {
 
 $_SESSION['username'] = $username;
 header("location:home.php"); 
 }
 else {
  echo "<script>alert('Username atau Password yang Anda masukkan salah! Silakan ulangi lagi');history.go(-1);</script>";
}

 ?>