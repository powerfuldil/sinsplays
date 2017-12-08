<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free Online Games">
  <meta name="keywords" content="RPG, Game, Free, Multiplayer">
  <meta name="author" content="Thomas Wu">
  <meta name="author" content="Dillon Hour">
  <link rel="icon" href="../img/favicon0.png">
  <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"  />
  <link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>
<body>

      <div class="container">
      <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.html">SinsPlay</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        <li class="active"><a href="../index.html"><span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userEmail']; ?>&nbsp;</a></li>
         <li class="wel"><a href="#">You are now signed in! (Use Arrow Keys to Play)</a></li>
        </ul>
          <ul class="nav navbar-nav navbar-right">         
          <li><a href="../index.html"><span class="glyphicon glyphicon-home"></span>&nbsp;Return To Home Page</a></li>
          <li><a href="logout.php?logout"><span class="glyphicon glyphicon-off"></span>&nbsp;Sign Off</a></li>
        </ul>
        </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->
      </nav>
        <script type="text/javascript" src="pong.js"></script>
            <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 SinsPlay, Inc. &middot;All rights reserved.</p>
      </footer>

      </div><!-- /.container -->


    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>


