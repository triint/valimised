<?php include "lang.php";?>
<div id="content">
<?php
if(isset($this->session->userdata['user']))
{
	echo validation_errors(); 
	echo form_open('/candidates'); 
	$userid=$this->session->userdata['user']->Valitud;
}
?>
  
	<table border='1'>
		<tr><th> <?=$str_name[$lang]?> </th><th> <?=$str_party[$lang]?> </th><th> <?=$str_area[$lang]?> </th></tr>
		<?php foreach($query as $row)
		{?>
		<?
		$id=$row->ID;
		?>
		<?php if(isset($this->session->userdata['user'])){?>
			<tr>
			<td>
			<input type="radio" name="candidate" value="<?=$id?>" <?if($userid!=0 and $userid!=$id) echo "disabled"; if($userid==$id) echo " checked";?>> 
			<?=$row->Nimi?> 
			</td> 
			<td> 
			<?=$row->Partei?> 
			</td>
			<td>
			<?=$row->Piirkond?>
			</td>
			</tr>
		<?} else {?>
			<tr><td><?=$row->Nimi?> </td> <td> <?=$row->Partei?> </td><td> <?=$row->Piirkond?> </td></tr>
		<?}?>
		<?}?>
	</table>
	<input type="submit" name="submit" value="<?=$str_login[$lang]?>" />
</form>