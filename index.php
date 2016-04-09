<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>E-valimised 2016</title>
    <link href="css/style.css" rel="stylesheet" media="screen">
  </head>
  <?php
  include "lang.php";
  $lang = $_COOKIE["lang"];?>
  <body>
  	  <div id="lang">
			<a href="test.php?lang=en">en</a>
			<a href="test.php?lang=et">et</a>	
		</div>
      <div id="header">
	  
      	<h1>E-valimised 2016</h1>	
		
      </div>

      <ul id ="menu">	
      </ul>
	  <ul id="menuleft">
		<li><a href="test.php?fn=index" target="testframe"><?=$str_menu_mainpage[$lang]?></a></li>
		<li><a href="test.php?fn=count" target="testframe"><?=$str_menu_statistics[$lang]?></a></li>
		<li><a href="test.php?fn=names" target="testframe"><?=$str_menu_candidates[$lang]?></a></li>
	  </ul>
	  <p id="para0">
		<a href="login.html" target="testframe"><?=$str_menu_login[$lang]?></a>
		</p>
      <div id="content">
		  <div id="framemain">
			<iframe name="testframe" src="test.php?fn=index" width=600 height=500></iframe>
		  </div>
	  </div>
  </body>
</html>