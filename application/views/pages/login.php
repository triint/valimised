  <div id="contentpw">
  <?include "lang.php"?>
  <?php echo validation_errors(); ?>
  <?php echo form_open('/login'); ?>
		<label for="username"><?=$str_username[$lang]?></label>
		<input type="text" name="username" placeholder=""/><br/>
		
		<label for="password"><?=$str_password[$lang]?></label>
		<input type="password" name="password" placeholder="**********"> <br>
		<input type="submit" name="submit" value="<?=$str_login[$lang]?>" />
	  </form>
  </div>
  