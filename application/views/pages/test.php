<?php
$cookie_lang="lang";
if($_GET[$cookie_lang])
	{
		setcookie($cookie_lang,$_GET[$cookie_lang], time() + (3600*24),"/");
		header("Location: index.php");
		die();
	}
?>
<html>
<link href="css/style.css" rel="stylesheet" media="screen">
</html>
<?php 
include "lang.php";
include "config.php";
$lang = $_COOKIE["lang"];
switch($_GET['fn'])
{
	case 'count':
		printCount($conn);
		break;
	case 'names':
		printNames($conn);
		break;
	case 'index':
		printIndex($conn);
		break;
	default:
		printIndex($conn);
		break;
}

function printIndex($conn)
{
	global $str_intro;
	global $lang;
	echo "<p id=\"para1\">" . $str_intro[$lang] . "</p>";
}
function printNames($conn)
{
	include "lang.php";
	$sql = "SELECT * FROM kandidaat ORDER BY Partei ASC;";
	$result = $conn->query($sql);
	echo "<table border='1'>";
	echo "<tr><th>" . $str_name[$lang] . "</th><th>" . $str_party[$lang] . "</th><th>" . $str_area[$lang]. "</th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr><td>" . $row['Nimi'] . "</td>" . "<td>" . $row['Partei'] . "</td>" . "<td>" . $row['Piirkond'] . "</td></tr>";
	}
	echo "</table>";
}
function printCount($conn)
{
	include "lang.php";
	$sql = "SELECT DISTINCT(Partei) as Partei FROM kandidaat ORDER BY Partei ASC";
	$result = $conn->query($sql);
	$parteiarray = array();
	while($row = $result->fetch_assoc())
	{
		array_push($parteiarray,$row['Partei']);
	}
	echo "<table border='1'>";
	echo "<tr><th>" . $str_party[$lang] . "</th><th>" . $str_votes[$lang] . "</th></tr>";
	foreach($parteiarray as $val)
	{
		$sql = "SELECT COUNT(*) AS C FROM kandidaat JOIN kasutaja ON kandidaat.Isikukood = kasutaja.Valitud WHERE Partei = '" . $val . "';";
		$result = $conn->query($sql);
		$count = $result->fetch_assoc();
		echo "<tr><td>" . $val . "</td>" . "<td>" . $count['C'] . "</td></tr>";
	}
	echo "</table>";
}
?>