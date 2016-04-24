  <div id="contentpw">
  <?include "lang.php"?>
  <?php echo validation_errors(); ?>
  <?php echo form_open('/login'); ?>
		<p><label for="username"><?=$str_username[$lang]?></label>
		<input type="text" id="username" name="username" placeholder=""/><br/></p>
		
		<p><label for="password"><?=$str_password[$lang]?></label>
		<input type="password" id="password" name="password" placeholder="**********"> <br></p>
		<p><input type="submit" name="submit" value="<?=$str_login[$lang]?>" /></p>
	  </form>
  </div>
  