<?php
session_start();
include "lang.php";
if (!empty($_POST))
{
	include "config.php";
	$user = $_POST['username'];
	$pw = $_POST['password'];
	$user = preg_replace('/[^A-Za-z0-9\. -]/', '', $user);
	$pw = preg_replace('/[^A-Za-z0-9\. -]/', '', $pw);
	$sql = "SELECT * FROM kasutaja WHERE username = \"" . $user . "\";";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	echo $_SESSION['user']['Nimi'];
	if($row['Password'] == md5($pw))
	{
		unset($row['Password']);
		$_SESSION['user'] = $row;
		echo "<script>window.parent.location.href = window.parent.location.href;</script>";
	}
	else
	{
		echo "Invalid credentials<br>";
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
		<?=$str_username[$lang]?><input type="text" name="username" placeholder=""> <br><br>
		<?=$str_password[$lang]?><input type="password" name="password" placeholder="**********"> <br><br>
		<input type="submit" value="<?=$str_login[$lang]?>"> <br>
	  </form>
  </div>
  </body>
  </html>