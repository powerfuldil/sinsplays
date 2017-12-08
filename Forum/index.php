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
  	<title>SinsPlay | Adding New Discussion</title>
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
		  <div class ="blog"><h1>Adding New Discussion</h1><br>
		  </div>
			<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
			<form id="form1" name="form1" method="post" action="add_new_topic.php">
			<td>
			<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
			<tr>
			<td colspan="3" bgcolor="#E6E6E6"><strong>Creating New Topic</strong> <br></td>
			</tr>
			<tr>
			<td width="14%"><strong>Topic</strong></td>
			<td width="2%">:</td>
			<td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
			</tr>
			<tr>
			<td valign="top"><strong>Detail</strong></td>
			<td valign="top">:</td>
			<td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
			</tr>
			<tr>
			<td><strong>Name</strong></td>
			<td>:</td>
			<td><input name="name" type="text" id="name" size="50" /></td>
			</tr>
			<tr>
			<td><strong>Email</strong></td>
			<td>:</td>
			<td><input name="email" type="text" id="email" size="50" /></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="Submit" value="Submit" /> 
			<input type="reset" name="Submit2" value="Reset" /><br>
			<br>
			<a href='main_forum.php?id=".$id."'>View Discussions</a>
			</td>
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