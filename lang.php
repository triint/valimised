<?php
$defaultlang = "et";
$cookie_lang = "lang";
$lang="";
if(!isset($_COOKIE[$cookie_lang]))
{
	setcookie($cookie_lang,$defaultlang, time() + (3600*24),"/");
	$lang=$defaultlang;
}
else
{
	$lang=$_COOKIE[$cookie_lang];
}
$str_intro = array("et" => "Tere tulemast aasta 2016 e-valimiste kodulehele!", "en" => "Welcome to the e-voting homepage of 2016!");
$str_menu_mainpage = array("et" => "Avaleht", "en" => "Main page");
$str_menu_statistics = array("et" => "Statistika", "en" => "Statistics");
$str_menu_candidates = array("et" => "Kandidaadid", "en" => "Candidates");
$str_menu_login = array("et" => "Sisselogimine", "en" => "Login");
$str_menu_register = array("et" => "Registreerimine", "en" => "Register");
$str_menu_logout = array("et" => "Logi välja", "en" => "Logout");
?>