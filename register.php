<?php
include "lang.php";
//$lang = $_COOKIE['lang'];
if (!empty($_POST))
{
	include "config.php";
	$user = $_POST['username'];
	$pw = $_POST['password'];
	$nimi = $_POST['nimi'];
	$isikukood = $_POST['isikukood'];
	$user = preg_replace('/[^A-Za-z0-9\. -]/', '', $user);
	$pw = preg_replace('/[^A-Za-z0-9\. -]/', '', $pw);
	$nimi = preg_replace('/[^A-Za-z0-9\. -]/', '', $nimi);
	$isikukood = preg_replace('/[^A-Za-z0-9\. -]/', '', $isikukood);
	$proceed=true;
	if(strlen($user)<3)
	{
		$proceed=false;
		echo "Invalid username<br>";
	}
	if(strlen($pw)<3)
	{
		$proceed=false;
		echo "Invalid password<br>";
	}
	if(strlen($nimi)<3)
	{
		$proceed=false;
		echo "Invalid name: " . $nimi . "<br>";
	}
	if(strlen($isikukood)!=11 or !ctype_digit($isikukood))
	{
		$proceed=false;
		echo "Invalid code<br>";
		echo strlen($isikukood);
	}
	if($proceed)
	{
		$sql = "SELECT * FROM kasutaja WHERE isikukood = " . $isikukood . ";";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row)
		{
			$proceed=false;
			echo "Code already in use<br>";
		}
		$sql = "SELECT * FROM kasutaja WHERE nimi = \"" . $nimi . "\";";
		$result = $conn->query($sql);
		
		$row = $result->fetch_assoc();
		if($row)
		{
			$proceed=false;
			echo "Name already in use<br>";
		}
		$sql = "SELECT * FROM kasutaja WHERE username = \"" . $user . "\";";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row)
		{
			$proceed=false;
			echo "Username already in use<br>";
		}
		if($proceed)
		{
			$mdpw = md5($pw);
			$sql = "INSERT INTO kasutaja (Isikukood, Nimi, Valitud, Username, Password) VALUES (" . $isikukood . ", \"" . $nimi . "\",0,\"" . $user . "\", \"" . $mdpw . "\");";
			$result = $conn->query($sql);
			if (!$result) {
				echo "Error<br>";
			}
			else
			{
				echo "Registration successful.";
			}
		}
		
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
	  <form name="log" method="POST" ACTION="register.php">
		<?=$str_username[$lang]?><input type="text" name="username" placeholder=""> <br><br>
		<?=$str_password[$lang]?><input type="password" name="password" placeholder="**********"> <br><br>
		<?=$str_name[$lang]?><input type="text" name="nimi" placeholder=""> <br><br>
		<?=$str_code[$lang]?><input type="text" name="isikukood" placeholder="" maxlength="11"> <br><br>
		<input type="submit" value="<?=$str_register[$lang]?>"> <br>
	  </form>
  </div>
  </body>
  </html>