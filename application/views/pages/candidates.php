<?php include "lang.php";?>
<div id="content">
<form action="/index.php/candidates" method="GET">
		<label for="name"><?=$str_name[$lang]?></label>
		<input type="text" name="name"/>
		<p><label for="partei"><?=$str_party[$lang]?></label>
		<select id = "partei" name="party">
			<option value=""/>
			<?php  
			foreach($parties as $party):?>
				<option value="<?=$party?>"><?=$party?></option>
			<?php endforeach;?>
		</select>
		<br/></p>
		
		<p><label for="piirkond"><?=$str_area[$lang]?></label>
		<select id = "piirkond" name="area">
		<option value=""/>
			<?php  
			foreach($areas as $area):?>
				<option value="<?=$area?>"><?=$area?></option>
			<?php endforeach;?>
		</select>
		<br></p>
		<p><input type="submit"  value="<?=$str_search[$lang]?>" /></p>
	</form>
	<br><br>
<?php
$userid=-1;

if(isset($this->session->userdata['user']))
{
	echo validation_errors(); 
	echo form_open('/candidates'); 
	$userid=$this->session->userdata['user']->Valitud;
	
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