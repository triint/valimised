<?php
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
	echo "<ul id =\"menu\">Invalid input</ul>";
}

include "login.html";
?>