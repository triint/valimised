<?include "lang.php"?>
<ul id ="menu">	
      </ul>
	  <ul id="menuleft">
		<li><a href="<?php echo base_url();?>index.php"><?=$str_menu_mainpage[$lang]?></a></li>
		<li><a href="<?php echo base_url();?>index.php/statistics" ><?=$str_menu_statistics[$lang]?></a></li>
		<li><a href="<?php echo base_url();?>index.php/candidates"><?=$str_menu_candidates[$lang]?></a></li>
	  </ul>
	  <p id="para0">
		<?php if(!isset($this->session->userdata['user'])){?>
		<a href="<?php echo base_url();?>index.php/login"><?=$str_menu_login[$lang]?></a>
		<a href="<?php echo base_url();?>index.php/register"><?=$str_menu_register[$lang]?></a>
		<?php } else{?>
		<?=$str_login_msg[$lang]?> <?=$this->session->userdata['user']->Nimi?> <a href="<?php echo base_url();?>index.php/logout"><?=$str_menu_logout[$lang]?></a>
		<?}?>
		</p>