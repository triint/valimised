<?php include "lang.php";?>
<!--Load the AJAX API-->
<script type="text/javascript" src="../assets/js/test.js"></script>
<script>
drawChart(<?=json_encode($query);?>);
</script>

<table>
<tr>
<th></th>
<?foreach($areas as $area)
echo "<th>" . $area . "</th>";?>
</tr>
<?php
foreach($areavotes as $votes)
{
	echo "<tr>";
	echo "<td>" . $votes['Partei'] . "</td>";
	foreach($areas as $area)
	{
		//echo $votes['Data'][$area];
		if(array_key_exists($area,$votes['Data']))
		{
			echo "<td>" . $votes['Data'][$area] . "</td>";
		}
		else
		{
			echo "<td>0</td>";
		}
	}
	echo "</tr>";
}

?>
</table>