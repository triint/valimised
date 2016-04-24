  <div id="contentpw">
  <?include "lang.php"?>
  <?php echo validation_errors(); ?>
  <?php echo form_open('/register'); ?>
		<?if(isset($errormsg)) echo $errormsg . "<br>";?>
		<p><label for="username"><?=$str_username[$lang]?></label>
		<input type="text" id="username" name="username" placeholder=""/><br/></p>
		
		<p><label for="name"><?=$str_name[$lang]?></label>
		<input type="text" id="name" name="name" placeholder=""/><br/></p>
		
		<p><label for="code"><?=$str_code[$lang]?></label>
		<input type="text" id="code" name="code" placeholder=""> <br></p>
		
		<p><label for="password"><?=$str_password[$lang]?></label>
		<input type="password" id="password" name="password" placeholder="**********"> <br></p>
		
		<p><label for="password2"><?=$str_confirmpassword[$lang]?></label>
		<input type="password" id="password2" name="password2" placeholder="**********"> <br></p>
		
		
		
		<p><input type="submit" name="submit" value="<?=$str_register[$lang]?>" /></p>
	  </form>
  </div>
  