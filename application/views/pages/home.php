<?php

session_start();

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
include "lang.php";?>
  	  <div id="lang">
			<a href="test.php?lang=en">en</a>
			<a href="test.php?lang=et">et</a>	
		</div>
      <div id="header">
	  
      	<h1>Votefy</h1>	
		
      </div>

      <ul id ="menu">	
      </ul>
	  <ul id="menuleft">
		<li><a href="test.php?fn=index" target="testframe"><?=$str_menu_mainpage[$lang]?></a></li>
		<li><a href="test.php?fn=count" target="testframe"><?=$str_menu_statistics[$lang]?></a></li>
		<li><a href="test.php?fn=names" target="testframe"><?=$str_menu_candidates[$lang]?></a></li>
	  </ul>
	  <p id="para0">
		<?php if(empty($_SESSION['user'])){?>
		<a href="login.php" target="testframe"><?=$str_menu_login[$lang]?></a>
		<a href="register.php" target="testframe"><?=$str_menu_register[$lang]?></a>
		<?php } else{?>
		<?=$str_login_msg[$lang]?> <?=$_SESSION['user']['Nimi']?> <a href="logout.php"><?=$str_menu_logout[$lang]?></a>
		<?}?>
		</p>
      <div id="content">
		  <div id="framemain">
			<iframe name="testframe" src="test.php?fn=index" width=600 height=500></iframe>
		  </div>
	  </div>