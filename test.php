<?php
	$defaultlang = "ez";
	$cookie_lang = "lang";
	if($_GET[$cookie_lang])
	{
		setcookie($cookie_lang,$_GET[$cookie_lang], time() + (3600*24),"/");
		header("Location: " . $_SERVER['HTTP_REFERER']);
		die();
	}
	if(!isset($_COOKIE[$cookie_lang]))
	{
		setcookie($cookie_lang,$defaultlang, time() + (3600*24),"/");
	}
	else
	{
		$lang = $_COOKIE[$cookie_lang];
	}
?>
<html>
<link href="css/style.css" rel="stylesheet" media="screen">
</html>
<?php 
include "lang.php";
include "config.php";
global $servername;
global $username;
global $password;
global $dbname;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
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
		echo "a";
}

function printIndex($conn)
{
	global $str_intro;
	global $lang;
	echo "<p id=\"para1\">" . $str_intro[$lang] . "</p>
		  <p>Tegu on Eesti e-hääletamise simulatsiooniga, mille valmides on võimalik hääletust läbi viia ja vaadata ka reaalajas statistikat</p>
		  <p id='para2'>Testiks üks paragrahv, et näidata erinevaid cssi variante fondi jaoks</p>";
}
function printNames($conn)
{
	$sql = "SELECT * FROM kandidaat ORDER BY Partei ASC;";
	$result = $conn->query($sql);
	echo "<table border='1'>";
	echo "<tr><th>Nimi</th><th>Partei</th><th>Piirkond</th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr><td>" . $row['Nimi'] . "</td>" . "<td>" . $row['Partei'] . "</td>" . "<td>" . $row['Piirkond'] . "</td></tr>";
	}
	echo "</table>";
}
function printCount($conn)
{
	$sql = "SELECT DISTINCT(Partei) as Partei FROM kandidaat ORDER BY Partei ASC";
	$result = $conn->query($sql);
	$parteiarray = array();
	while($row = $result->fetch_assoc())
	{
		array_push($parteiarray,$row['Partei']);
	}
	echo "<table border='1'>";
	echo "<tr><th>Partei</th><th>Hääli</th></tr>";
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