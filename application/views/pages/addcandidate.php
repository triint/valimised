  <div id="contentpw">
  <?include "lang.php"?>
  <?php echo validation_errors(); ?>
  <?php echo form_open('/addcandidate'); ?>
		<p><label for="partei"><?=$str_party[$lang]?></label>
		<select id = "partei" name="party">
			<?php  
			foreach($parties as $party):?>
				<option value="<?=$party?>"><?=$party?></option>
			<?php endforeach;?>
		</select>
		<br/></p>
		
		<p><label for="piirkond"><?=$str_area[$lang]?></label>
		<select id = "piirkond" name="area">
			<?php  
			foreach($areas as $area):?>
				<option value="<?=$area?>"><?=$area?></option>
			<?php endforeach;?>
		</select>
		<br></p>
		<p><input type="submit" name="submit" value="<?=$str_login[$lang]?>" /></p>
	  </form>
  </div>
  