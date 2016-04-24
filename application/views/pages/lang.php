<?php
$defaultlang = "et";
$langs = array("et", "en");
$cookie_lang = "lang";
$lang = $_GET['lang'];
if(in_array($lang,$langs))
	setcookie($cookie_lang,$lang, time() + (3600*24),"/");
else
	setcookie($cookie_lang,$defaultlang, time() + (3600*24),"/");
redirect($this->agent->referrer());
?>