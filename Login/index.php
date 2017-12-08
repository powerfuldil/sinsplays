<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free Online Games">
    <meta name="keywords" content="RPG, Game, Free, Multiplayer">
    <meta name="author" content="Thomas Wu">
    <meta name="author" content="Dillon Hour">
    <link rel="icon" href="../img/favicon4.png">
    <title>SinsPlay | Sign In</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
  </head>
    <body>
    <div class="container">
      <!-- Static navbar -->
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
        <ul class="nav navbar-nav navbar-right">         
          <li class="active"><a href="index.php">Log In</a></li>
          <li><a href="register.php">Register</a></li>
        </ul>
        </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->
      </nav>

  <body>
    <div class="container">
       <div id="login-form">
        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
          <div class="col-md-12">
            <div class="form-signin">
             <h2 class="form-signin-heading">Please Sign In.</h2>
            </div>
              <div class="form-signin">
                <hr />
              </div>
            
  <?php
              if ( isset($errMSG) ) {
    
  ?>
              <div class="form-signin">
                <div class="alert alert-danger">
                  <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
  <?php
              }
   ?>
        <div class="form-signin">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
              </div>
                <span class="text-danger"><?php echo $emailError; ?></span><br>
        </div>
        <div class="form-signin">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                  <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
            </div>
                <span class="text-danger"><?php echo $passError; ?></span>
          <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        </div>
            <div class="form-signin">
                <hr />
            </div>
            <div class="form-signin">
                <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
                <div class="form-signin">
                    <hr />
                </div>
                <div class="form-signin">
                  <a href="register.php">Don't Have Account? <br>Register Now</a><br><br>
                  <a href="../index.html">Return Home</a>
            </div>
        </div>
    </form>
    </div> 
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 SinsPlay, Inc. &middot;All rights reserved.</p>
      </footer>

        </div><!-- /.container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
      </body>
</html>