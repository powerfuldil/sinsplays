<?php
 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="myforum"; // Database name 
$tbl_name="fquestions"; // Table name 
 
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
 
$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending
 
$result=mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="Free Online Games">
  	<meta name="keywords" content="RPG, Game, Free, Multiplayer">
  	<meta name="author" content="Thomas Wu">
  	<meta name="author" content="Dillon Hour">
  	<title>SinsPlay | Forum</title>
    <link rel="icon" href="../img/favicon4.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/carousel.css" rel="stylesheet">
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
				<ul class="nav navbar-nav">
				  <li><a href="../index.html">News</a></li>
				  <li class="active"><a href="main_forum.php">Forum</a></li>
				  <li><a href="../shop.html">Merchandise</a></li>
				  <li class="dropdown">
					<a href="../games.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Games <span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="../games.html">Sins</a></li>
					  <li><a href="../games.html">Terminal Galaxy</a></li>
					  <li><a href="../games.html">Rhythm Runner</a></li>
					</ul>
				  </li>
				</ul>
				<ul class="nav navbar-nav navbar-right">				 
				  <li><a href="../login/index.php">Log In</a></li>
				  <li><a href="../login/register.php">Register</a></li>
				</ul>
			  </div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		  </nav>
		  <div class ="blog"><h1>View Recent Post...</h1><br>
		  </div>
			<form action="index.php" align="center">
			    <input type="submit" class="butt" value="Add New Discussion"/>
			</form><br><br>
			<div class="for-table">
			<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
				<tr class="pos">
					<td width="3%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
					<td width="53%" align="left" bgcolor="#E6E6E6"><strong>  Topic</strong></td>
					<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
					<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
					<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
					<td width="3%" align="center" bgcolor="#E6E6E6"></td>
				</tr> 
				<?php
				// Start looping table row
				while($rows = mysql_fetch_array($result)){
				?>
					<tr>
						<td bgcolor="#E6E6E6" align="center"><?php echo $rows['id']; ?></td>
						<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
						<td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
						<td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
						<td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
						<td align="center" bgcolor="#E6E6E6"></td>
					</tr>
 
				<?php
// Exit looping and close connection 
				}
				mysql_close();
				?>			 
				<tr>
					<td width="3%" align="center" bgcolor="#E6E6E6"></td>
					<td colspan="5" align="center" bgcolor="#E6E6E6"><a href="index.php"><strong><br>Add New Discussion</strong></a><br><br></td>
				</tr>
				</table>
			</div>
      <!-- FOOTER -->
		      <footer>
		        <p class="pull-right"><a href="#">Back to top</a></p>
		        <p>&copy; 2017 SinsPlay, Inc. &middot;All rights reserved.</p>
		      </footer>
	</body>
</html>
