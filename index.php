<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>E-valimised 2016</title>
    <link href="css/style.css" rel="stylesheet" media="screen">
  </head>
  <?php
  include "lang.php";
  //global $str_menu_mainpage;
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
      	<li><a href="https://www.swedbank.ee/private/">Swed</a></li>
      	<li><a href="https://www.facebook.com">Facebook</a></li>
      </ul>
	  <ul id="menuleft">
		<li><a href="test.php?fn=index" target="testframe"><?php echo $str_menu_mainpage[$lang]?></a></li>
		<li><a href="test.php?fn=count" target="testframe"><?php echo $str_menu_statistics[$lang]?></a></li>
		<li><a href="test.php?fn=names" target="testframe"><?php echo $str_menu_candidates[$lang]?></a></li>
	  </ul>
      <p id="para0"> <?php echo $str_menu_login[$lang]?>: </p>
      <div id="content">
		  <!--<p id="para1">Tere tulemast aasta 2016 e-valimiste kodulehele!</p>
		  <p>Tegu on Eesti e-hääletamise simulatsiooniga, mille valmides on võimalik hääletust läbi viia ja vaadata ka reaalajas statistikat</p>
		  <p id="para2">Testiks üks paragrahv, et näidata erinevaid cssi variante fondi jaoks</p> <-->
		  
		  <div id="framemain">
			<iframe name="testframe" src="test.php?fn=index" width=600 height=500></iframe>
		  </div>
	  </div>
  </body>
</html>