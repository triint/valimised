<?php
$servername = "localhost";
$username = "votefycs_dbuser";
$password = "dbpassword123";
$dbname = "votefycs_db";
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
	default:
		echo "a";
}
/*$result = $conn->query("SELECT * FROM kasutaja;");
while($row = $result->fetch_assoc())
{
	echo $row["Isikukood"] . "  " . $row["Nimi"] . "  ";
	$sql2 = "SELECT * FROM kandidaat WHERE Isikukood = " . $row["Valitud"] . ";";
	$valitud = $conn->query($sql2);
	$valitudrow = $valitud->fetch_assoc();
	echo "Valitud: " . $valitudrow["Nimi"] . " Partei: " . $valitudrow["Partei"] .  "<br>";
}
echo "<br><br><br><br><br><br>";
$result = $conn->query("SELECT a.Nimi AS kandidaatNimi, a.Partei, b.Nimi AS kasutajaNimi FROM kandidaat AS a JOIN kasutaja AS b ON a.Isikukood = b.Valitud ORDER BY Partei DESC;");
$part="";
while($row = $result->fetch_assoc())
{
	if($part!=$row['Partei'])
	{
		$part=$row['Partei'];
		echo "<b>$part:</b><br>";
	}
	echo "&nbsp&nbsp&nbsp&nbsp&nbsp" . $row['kasutajaNimi'] . "<br>";
}
echo "<br><br><br><br><br><br>";*/
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