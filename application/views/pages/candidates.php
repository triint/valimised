<?php include "lang.php";?>
<div id="content">
<?php
$userid=-1;
if(isset($this->session->userdata['user']))
{
	echo validation_errors(); 
	echo form_open('/candidates'); 
	$userid=$this->session->userdata['user']->Valitud;
	if(!$iscandidate):
	?>
		<a href="<?php echo base_url();?>index.php/addcandidate"><?=$str_addcandidate[$lang]?></a><br><br>
	<?php endif;
}
?>
  
	<table>
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
			<?php if($userid==$id) echo "<b>";?>
			<?=$row->Nimi?> 
			<?php if($userid==$id) echo "</b>";?>
			</td> 
			<td> 
			<?php if($userid==$id) echo "<b>";?>
			<?=$row->Partei?> 
			<?php if($userid==$id) echo "</b>";?>
			</td>
			<td>
			<?php if($userid==$id) echo "<b>";?>
			<?=$row->Piirkond?>
			<?php if($userid==$id) echo "</b>";?>
			</td>
			</tr>
			
		<?} else {?>
			<tr><td><?=$row->Nimi?> </td> <td> <?=$row->Partei?> </td><td> <?=$row->Piirkond?> </td></tr>
		<?}?>
		<?}?>
	</table>	
	<?if($userid!=-1 and $iscandidate!=-1 and $iscandidate!=1){?>
	<input type="submit" name="submit" value="<?if($userid!=0){ echo $str_cancelvote[$lang]; }else{ echo $str_vote[$lang];}?>" />
	<?echo "</form>";}?>
	</div>