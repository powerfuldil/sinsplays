<?php
 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="myforum"; // Database name 
$tbl_name="fquestions"; // Table name 
 
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
 
// get value of id that sent from address bar 
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
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
		  <div class ="blog"><h1>Viewing Recent Post...</h1><br>
		  </div>
			<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
			<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
			<tr>
			<td bgcolor="#F8F7F1"><strong><?php echo $rows['topic']; ?></strong></td>
			</tr>
			 
			<tr>
			<td bgcolor="#F8F7F1"><?php echo $rows['detail']; ?></td>
			</tr>
			 
			<tr>
			<td bgcolor="#F8F7F1"><strong>By :</strong> <?php echo $rows['name']; ?> <strong>Email : </strong><?php echo $rows['email'];?></td>
			</tr>
			 
			<tr>
			<td bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo $rows['datetime']; ?></td>
			</tr>
			</table></td>
			</tr>
			</table>
			<BR>
			 
			<?php
			 
			$tbl_name2="fanswer"; // Switch to table "forum_answer"
			$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
			$result2=mysql_query($sql2);
			while($rows=mysql_fetch_array($result2)){
			?>
			 
			<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
			<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
			<tr>
			<td bgcolor="#F8F7F1"><strong>ID</strong></td>
			<td bgcolor="#F8F7F1">:</td>
			<td bgcolor="#F8F7F1"><?php echo $rows['a_id']; ?></td>
			</tr>
			<tr>
			<td width="18%" bgcolor="#F8F7F1"><strong>Name</strong></td>
			<td width="5%" bgcolor="#F8F7F1">:</td>
			<td width="77%" bgcolor="#F8F7F1"><?php echo $rows['a_name']; ?></td>
			</tr>
			<tr>
			<td bgcolor="#F8F7F1"><strong>Email</strong></td>
			<td bgcolor="#F8F7F1">:</td>
			<td bgcolor="#F8F7F1"><?php echo $rows['a_email']; ?></td>
			</tr>
			<tr>
			<td bgcolor="#F8F7F1"><strong>Answer</strong></td>
			<td bgcolor="#F8F7F1">:</td>
			<td bgcolor="#F8F7F1"><?php echo $rows['a_answer']; ?></td>
			</tr>
			<tr>
			<td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
			<td bgcolor="#F8F7F1">:</td>
			<td bgcolor="#F8F7F1"><?php echo $rows['a_datetime']; ?></td>
			</tr>
			</table></td>
			</tr>
			</table><br>
			 
			<?php
			}
			 
			$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
			$result3=mysql_query($sql3);
			$rows=mysql_fetch_array($result3);
			$view=$rows['view'];
			 
			// if have no counter value set counter = 1
			if(empty($view)){
			$view=1;
			$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
			$result4=mysql_query($sql4);
			}
			 
			// count more value
			$addview=$view+1;
			$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
			$result5=mysql_query($sql5);
			mysql_close();
			?>
			 
			<BR>
			<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
			<form name="form1" method="post" action="add_answer.php">
			<td>
			<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
			<tr>
			<td width="18%"><strong>Name</strong></td>
			<td width="3%">:</td>
			<td width="79%"><input name="a_name" type="text" id="a_name" size="45"></td>
			</tr>
			<tr>
			<td><strong>Email</strong></td>
			<td>:</td>
			<td><input name="a_email" type="text" id="a_email" size="45"></td>
			</tr>
			<tr>
			<td valign="top"><strong>Answer</strong></td>
			<td valign="top">:</td>
			<td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
			<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"><br><br>
			<a href='index.php?id=".$id."'>Add New Discussion</a><br>
			<a href='main_forum.php?id=".$id."'>Go Back</a></td>
			</tr>
			</table>
			</td>
			</form>
			</tr>
			</table>
      <!-- FOOTER -->
		      <footer>
		        <p class="pull-right"><a href="#">Back to top</a></p>
		        <p>&copy; 2017 SinsPlay, Inc. &middot;All rights reserved.</p>
		      </footer>
	</body>
</html>