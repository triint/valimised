 <?include "lang.php";?>
	  <div id="content">
		<?=$str_intro[$lang];?><br>
		<?if(!$iscandidate):
			?>
		<a href="<?php echo base_url();?>index.php/addcandidate"><?=$str_addcandidate[$lang]?></a><br><br>
	<?php endif;?>
	  </div>