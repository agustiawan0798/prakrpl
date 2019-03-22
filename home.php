<?php 
	session_start();

	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sistem Informasi Alumni FT Undip</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
		<link href="assets/css/footer.css" rel="stylesheet">
    <link href="assets/css/keyframe.css" rel="stylesheet">
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
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      <div class="m-scene" id="main">
  <div class="m-header scene_element scene_element--fadein">
        <h1>Selamat Datang</h1>
        <p>di Sistem Informasi Alumni Fakultas Teknik Universitas Diponegoro</p>
        <p><a class="btn btn-primary btn-lg" href="tentang.php" role="button">Tentang &raquo;</a></p>
      </div>
      </div>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Alumni</h2>
          <p>Berisi database Alumni </p>   
          <p><a class="btn btn-default" href="alumni2.php" role="button">Lihat Selengkapnya &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Jurusan</h2>
          <p>Berisi database jurusan yang ada di FT UNDIP </p>
          <p><a class="btn btn-default" href="jurusan.php" role="button">Lihat Selengkapnya &raquo;</a></p>
       </div>
      </div>
      
      <hr>
    </div> <!-- /container -->

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

<script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>