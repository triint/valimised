<?php
$str_intro = array("et" => "Tere tulemast aasta 2016 e-valimiste kodulehele!", "en" => "Welcome to the e-voting homepage of 2016!");
$str_menu_mainpage = array("et" => "Avaleht", "en" => "Main page");
$str_menu_statistics = array("et" => "Statistika", "en" => "Statistics");
$str_menu_candidates = array("et" => "Kandidaadid", "en" => "Candidates");
$str_menu_login = array("et" => "Sisselogimine", "en" => "Login");
$defaultlang = "et";
$cookie_lang = "lang";
if($_GET[$cookie_lang])
	{
		setcookie($cookie_lang,$_GET[$cookie_lang], time() + (3600*24),"/");
		die();
	}
?>