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
$str_candidate = array("et" => "Kandidaat", "en" => "Candidate");
$str_menu_login = array("et" => "Sisselogimine", "en" => "Login");
$str_menu_register = array("et" => "Registreerimine", "en" => "Register");
$str_menu_logout = array("et" => "Logi välja", "en" => "Logout");
$str_login_msg = array("et" => "Olete sisselogitud kui", "en" => "You are logged in as ");
$str_name = array("et" => "Nimi", "en" => "Name");
$str_party = array("et" => "Partei", "en" => "Party");
$str_area = array("et" => "Piirkond", "en" => "Area");
$str_votes = array("et" => "Hääli", "en" => "Votes");
$str_username = array("et" => "Kasutajatunnus", "en" => "Username");
$str_password = array("et" => "Parool", "en" => "Password");
$str_login = array("et" => "Logi sisse", "en" => "Login");
$str_register = array("et" => "Registreeri", "en" => "Register");
$str_code = array("et" => "Isikukood", "en" => "Identification code");
$str_vote = array("et" => "Hääleta", "en" => "Vote");
$str_cancelvote = array("et" => "Tühista hääl", "en" => "Cancel vote");
?>