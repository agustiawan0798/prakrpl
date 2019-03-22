<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Database Alumni FT Undip</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
body {
   background-image:url(wisuda.jpg);
   /* -webkit-filter: blur(3px); */
   background-repeat: no-repeat;
   background-size: cover;
   
}
</style>

   <div class="container">
         
      <form method="post" action="ceklogin.php" class="login">
         <h2>Login</h2>
         <div class="input-group">
            <div class="input-group-addon">
               <span class="glyphicon glyphicon-user"></span>
            </div>
            <input type="text" name="username" class="form-control" placeholder="username" required autofocus>
         </div>
         <div class="input-group">
            <div class="input-group-addon">
               <span class="glyphicon glyphicon-lock"></span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="password" required>
         </div>
         <input class="btn btn-lg btn-success btn-block topmargin" type="submit" name="login" value="Login">
      </form>

   </div>
   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>