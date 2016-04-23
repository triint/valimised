<?php
unset($_SESSION['user']);
$baseurl = base_url();
header("Location: " . $baseurl);
die("Logout successful");
?>