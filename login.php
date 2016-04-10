<?php
if (!empty($_POST))
{
	include "config.php";
	$user = $_POST['username'];
	$pw = $_POST['password'];
	$validuser = ctype_alnum($user);
	$validpw = ctype_alnum($pw);
	if($validuser and $validpw)
	{
		//proceed
	}
	else
	{
		echo "Invalid input";
	}
}
?>

<html>
  <head>
    <meta charset="utf-8"/>
    <title>E-valimised 2016</title>
    <link href="css/style.css" rel="stylesheet" media="screen">
  </head>
  <body>
  <div id="contentpw">
	  <form name="log" method="POST" ACTION="login.php">
		<input type="text" name="username" placeholder="Username"> <br><br>
		<input type="password" name="password" placeholder="**********"> <br><br>
		<input type="submit" value="submit"> <br>
	  </form>
  </div>
  </body>
  </html>