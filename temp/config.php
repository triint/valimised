<?php
$servername = "localhost";
$username = "votefycs_dbuser";
$password = "votefypw123";
$dbname = "votefycs_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>